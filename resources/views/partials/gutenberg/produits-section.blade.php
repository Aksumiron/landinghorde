{{--
  Title: Produits section
  Description: _
  Category: _
  Icon: _
  Keywords: _
  --}}

@php
$id = get_field('id_section');
$titre = get_field('produits_titre');
$description = get_field('description_section');
$produits = get_field('n_produits');
@endphp

<section id="{{ $id }}">
  <div class="full-width dark-background py-7">
    <div class="container">
      <div class="row section-produits">
        <div class="col-md-12">
          <h2 class="pb-3">{{ $titre }}</h2>
          <h4 class="pb-3">{{ $description }}</h4>
        </div>
      </div>
      <div class="row">
        @php
        $produits = new WP_Query(['post_type'=>'produits']);
        if ($produits->have_posts()) : while ($produits->have_posts()) : $produits->the_post();
        @endphp
        <a class="col-md-4" href="#"> {{-- {{ the_permalink() }} --}}
          <h4>{{ the_title() }}</h4>
        </a>
        @php
        endwhile;
        endif;
        // print_r($produits)
        @endphp
      </div>
    </div> {{-- /container  --}}
  </div>
</section>
