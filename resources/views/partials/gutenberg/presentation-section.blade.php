{{--
  Title: Presentation section
  Description: Deuxième section de la page qui contient une vidéo de la présentation ainsi que le texte descriptif
  Category: _
  Icon: _
  Keywords: _
  --}}

  @php
  $id = get_field('id');
  $titre = get_field('titre');
  $txt = get_field('txt');
  $btn_txt = get_field('btn_action');
  $iframe = get_field('video');

  @endphp

<div id="{{ $id }}"class="row">
  <div class="col-md-6 col-sm-12">
    <h3><b>{{ $titre }}</b></h3>
    <h4>{{ $txt }}</h4>

    <button type="button" class="button-cta">{{ $btn_txt }}</button>

  </div>
  <div class="col-md-6 col-sm-12">
    <div class="embed-container">
      {!! $iframe  !!}
  </div>
  </div>

</div>
