{{--
  Title: Documents Section
  Description: _
  Category: _
  Icon: _
  Keywords: _
  --}}
@php
$id = get_field('id_section');
$titre = get_field('titre_section');
$desc = get_field('descr_section');
$file = get_field('docs');
@endphp

<section id="$id">
  <div class="full-width dark-background ">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>{{ $titre }}</h2>
        </div>
        <div class="col-md-9">
          <h4 class="text-justify">{{ $desc }}</h4>
        </div>
        <div class="col-md-3">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          @if ($file)
          <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Affichez tous les documents
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ $file['url'] }}">{{$file['filename']}}</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
