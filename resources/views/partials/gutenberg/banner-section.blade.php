{{--
  Title: Banner Section
  Description: _
  Category: _
  Icon: _
  Keywords: banner, statistiques, cta
  --}}

@php
$id = get_field('id_section');
$img = get_field('background_image');
$txt = get_field('txt_test');
$rows = get_field('stats_cta');
@endphp


  <section id="{{ $id }}" class="banner">
    <div class="img-banner">
      <img src="{{ $img['url'] }}" class="full-width img-fluid" alt="{{ $img['alt'] }}">
    </div>
    @if ($rows)
    <div class="row stats-ctas">
      @foreach ($rows as $row)
      <div class="col-4">
        <div class="stats">
          <div class="stat-number">
            <h1>{{ $row['stats_nb'] }}</h1>
          </div>
          <div class="stat-txt">
            <h3>{{ $row['stats_txt'] }}</h3>
          </div>
        </div>
        <div class="ctas">
          <div class="cta-titre">
            <h4>{{ $row['cta_titre'] }}</h4>
          </div>
          <div class="cta-txt">
            <h5>{{ $row['cta_txt'] }}</h5>
          </div>
          <button type="button" class="button-cta" onclick="window.location.href='/landing_horde/#{{ $row['btn_lien'] }}'"> {{ $row['cta_txt_btn'] }}</button>
        </div>
      </div>
      @endforeach
    </div>
    @endif
  </section>
