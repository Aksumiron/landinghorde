{{--
  Title: Equipe Section
  Description: _
  Category: _
  Icon: _
  Keywords: _
--}}
@php
$id = get_field('id_section');
$titre = get_field('titre_section');
$img = get_field('img_equipe');
$descr = get_field('descr_section');
@endphp

<section id="{{ $id }}" class="py-7">
<div class="row equipe-section">
  <div class="col-md-12">

    <img src="{{ $img['url'] }}"  class="w-100 img-fluid" alt="">
    <div class="equipe-txt white-txt text-justify">
      <h3>{{ $titre }}</h3>
      <h4>{{ $descr }}</h4>
    </div>
  </div>
</div>
</section>
