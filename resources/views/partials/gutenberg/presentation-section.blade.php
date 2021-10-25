{{--
  Title: Presentation section
  Description: _
  Category: _
  Icon: _
  Keywords: _
  --}}

@php
$id = get_field('id_section');
$titre = get_field('presentation_titre');
$txt = get_field('txt');
$btn_txt = get_field('btn_action');
$btn_lien = get_field('btn_lien');
$iframe = get_field('video');
@endphp

<section id="{{ $id }}" class="py-7">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <h3 class="pb-3"><b>{{ $titre }}</b></h3>
      <h4 class="pb-3">{{ $txt }}</h4>
      <button type="button" class="button-cta" onclick="window.location.href='/landing_horde/#{{ $btn_lien }}'">{{ $btn_txt }}</button>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="embed-responsive embed-responsive-16by9 embed-container">
        {!! $iframe !!}
      </div>
    </div>
  </div>
</section>
