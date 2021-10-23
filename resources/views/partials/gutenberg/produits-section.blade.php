{{--
  Title: Produits section
  Description: Deuxième section de la page qui contient une vidéo de la présentation ainsi que le texte descriptif
  Category: _
  Icon: _
  Keywords: _
  --}}

</div>{{-- /container --}}
@php
  $titre = get_field('produits_titre');
  $description = get_field('description_section');


@endphp

<div class="full-width dark-background ">
  <div class="container">
  <div class="row section-produits">
    <div class="col-md-12">
      <h2>{{ $titre }}</h2>
      <h4>{{ $description }}</h4>
    </div>
  </div>
</div>
 </div>

@php
$args = array(
  'posts_per_page'   => -1, // -1 here will return all posts
  'post_type'        => 'produits', //your custom post type
  'post_status'      => 'publish',
);
$products = get_posts( $args );

foreach ($products as $product) {
  printf('<div><a href="%s">%s</a></div>',
          get_permalink($product->ID),
          $product->post_title);
}

  print_r($products);



@endphp
