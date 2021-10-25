<header class="header">
  <div id="container-header">
    <div class="container">
      <div class="logo"><a id="logo" href="#">
          <h1>Logo</h1>
        </a></div>
      <nav>
        @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_id' => 'navbar']) !!}
        @endif
      </nav>
    </div>
  </div>
</header>
