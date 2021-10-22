<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;
use Brain\Hierarchy\Finder\FoldersTemplateFinder;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin', 'wp_bootstrap_navwalker']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);

// Custom Fields Gutenberg

/* WP GUTENGBERG CATEGORY */
function new_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'content',
                'title' => __( 'Contenu', 'Admin' ),
            ),
            array(
                'slug'  => 'section',
                'title' => __( 'Section', 'Admin' ),
            ),
        )
    );
}

add_filter( 'block_categories', 'new_block_category', 10, 2 );

/* REGISTER ACF BLOCKS */
// add_action( 'acf/init', 'acf_blocks' );
// function acf_blocks() {
//     if ( function_exists( 'acf_register_block' ) ) {
//
//         /* DEFAULT BLOCK - EXCERPT */
//         acf_register_block( array(
//             'name'            => 'banner-section',
//             'title'           => __( 'Banner Section', 'Admin' ),
//             'render_callback' => 'acf_block_render_callback',
//             'category'        => 'content',
//             'icon'            => 'editor-alignleft',
//             'keywords'        => array( 'tag 1', 'tag 2' ),
//             'mode'            => 'edit',
//             'supports'        => array( 'mode' => false, ),
//         ) );
//
//     }
// }

/* DISABLE DEFAULT GUTENBERG BLOCKS */
add_filter( 'allowed_block_types', 'allow_acf_blocks' );
function allow_acf_blocks( $allowed_blocks ) {
    return array(
        'acf/banner-section',
    );
}

/* ACF RENDER BLOCK */
// function acf_block_render_callback( $block ) {
//     $slug = str_replace( 'acf/', '', $block['name'] );
//     if ( file_exists( get_theme_file_path( "resources/views/partials/gutenberg/{$slug}.blade.php" ) ) ) {
//         include( get_theme_file_path( "resources/views/partials/gutenberg/{$slug}.blade.php" ) );
//     }
// }

function my_acf_block_render_callback($block)
{
    $slug = str_replace('acf/', '', $block['name']);
    $block['slug'] = $slug;
    //$block['classes'] = implode(' ', [$block['slug'], $block['className'], $block['align']]);
    echo \App\template("partials/gutenberg/${slug}", ['block' => $block]);
}

add_action('acf/init', function () {
    if (function_exists('acf_register_block')) {
        $dir = new DirectoryIterator(locate_template("/views/partials/gutenberg/"));
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $slug = str_replace('.blade.php', '', $fileinfo->getFilename());
                $file_path = locate_template("/views/partials/gutenberg/${slug}.blade.php");
                $file_headers = get_file_data($file_path, [
                    'title' => 'Title',
                    'description' => 'Description',
                    'category' => 'Category',
                    'icon' => 'Icon',
                    'keywords' => 'Keywords',
                ]);
                if (empty($file_headers['title'])) {
                    die(_e('This block needs a title: ' . $file_path));
                }
                if (empty($file_headers['category'])) {
                    die(_e('This block needs a category: ' . $file_path));
                }
                $datas = [
                    'name' => $slug,
                    'title' => $file_headers['title'],
                    'description' => $file_headers['description'],
                    'category' => $file_headers['category'],
                    'icon' => $file_headers['icon'],
                    'keywords' => explode(' ', $file_headers['keywords']),
                    'render_callback' => 'my_acf_block_render_callback',
                    'mode' => 'edit',
                    'supports' => array('mode' => false)
                ];
                acf_register_block($datas);
            }
        }
    }
});
