<footer class="full-width dark-background py-5 ">
  <div class="container">
    <div class="row">
      <div class="col-md-4 align-left">
        @php
        wp_nav_menu( array('theme_location' => 'secondary'));
        @endphp
      </div>
      <div class="col-md-4 align-left">
        @php
        wp_nav_menu( array('theme_location' => 'tertiary'));
        @endphp
      </div>
      <div class="col-md-4">
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="footer-logo">
          {!! the_field('footer_logo', 'option'); !!}
        </div>
      </div>
      <div class="col-md-6 align-right">
        <div class="copyright-txt">
          {!! the_field('copyright_txt', 'option'); !!}
        </div>
      </div>
    </div>
  </div>
</footer>
