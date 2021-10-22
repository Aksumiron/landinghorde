{{--
  Title: Banner Section
  Description: textarea
  Category: _
  Icon: _
  Keywords: _
  --}}

<div class="row">
  <div class="col-12">
    <section class="banner">
      <img src="{{ the_field('background_image')->src }}" class="img-fluid" alt="">
    </section>
  </div>
</div>

{{-- @php

// Check rows exists.
if( have_rows('stats') ):

    // Loop through rows.
    while( have_rows('stats') ) : the_row();

        // Load sub field value.
        $sub_value = get_sub_field('nb');
        echo '<div> hello </div>'

    // End loop.
    endwhile;

@endphp --}}

{{-- {!! the_field('stats')->nb !!}

@if (the_field('stats'))
  {{ $rows = get_field('stats'); }}
  <div class='stats'>
    @foreach ($rows as $row)
      {{ $number = $row['nb'] }}
      <div class="number">
        {{ $number }}
      </div>
    @endforeach
  </div>
@endif --}}
{{-- @php
$rows = get_field('stats');

if( $rows ) {
    echo '<div>';
    foreach( $rows as $row ) {
      $nubmer = $row['nb']
      $txt_paragraph = $row['txt_paragraph']

      echo '<div>';
        $nubmer
      echo '</div>';
    }
    echo '</div>';
}
@endphp --}}


@php
  $txt = get_field('txt_test');
  $rows = get_field('stats');
@endphp


@php
  print_r($rows)
@endphp

@if ($rows)
  @foreach ($rows as $row)
    <div class="number">
      {{ $row['nb'] }}
    </div>
    <div class="paragraph">
      {{ $row['txt_paragraph'] }}
    </div>
  @endforeach
@endif
