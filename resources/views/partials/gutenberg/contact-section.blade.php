{{--
  Title: Contact Section
  Description: _
  Category: _
  Icon: _
  Keywords: _
  --}}
@php
  $id = get_field('id_section');
  $titre = get_field('titre_section');
  $desc = get_field('descr_section');
  $contact_form = get_field('form_contact');
@endphp

<section id="{{ $id }}">
  <div class="row">
    <div class="col-md-12">
      <h2>{{ $titre }}</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h4>{{$desc}}</h4>
    </div>
    <div class="col-md-6">
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      {!! $contact_form !!}
    </div>
  </div>
</section>
