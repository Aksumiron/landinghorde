<nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
  <button class="navbar-toggler" type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false"
          aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{ home_url('/') }}">LOGO</a>
  <div class="collapse navbar-collapse nav-primary ml-auto"  id="navbarSupportedContent">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'navbar-nav nav ml-auto']) !!}
    @endif
  </div>
</nav>

{{-- <header>
  <div class="banner">
  <div class="container">
    <div class="logo-section">
    <div class="row">
      <div class="col-6">
        <div class="logo">
          <h1>LOGO</h1>
        </div>
      </div>
      <div class="col-6">
        <nav>
          <ul class="navigation-menu">
            <li><a href="#ancre1">Ancre 1</a></li>
            <li><a href="#ancre2">Ancre 2</a></li>
            <li><a href="#ancre3">Ancre 3</a></li>
            <li><a href="#ancre4">Ancre 4</a></li>
          </ul>
        </nav>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
</header> --}}
