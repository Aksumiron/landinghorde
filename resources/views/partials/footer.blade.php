<footer class="full-width dark-background">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        @php
        wp_nav_menu( array( 'theme_location' => 'secondary'));
        @endphp
      </div>
      <div class="col-md-4">
        @php
        wp_nav_menu( array( 'theme_location' => 'tertiary'));
        @endphp
      </div>
      <div class="col-md-4">
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
        {!! the_field('footer_logo', 'option'); !!}
      </div>
      <div class="col-md-6">
        {!! the_field('copyright_txt', 'option'); !!}
      </div>
    </div>
  </div>

</footer>
</div> {{-- /container --}}
