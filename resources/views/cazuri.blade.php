@extends('parts.template')

@section('title', 'Cazuri')

@section('content')


<section id="blog-page-image" class="overflow-hidden">
  <div class="grey-overlay">
    <img src="img/woman-dentist-in-the-medical-dental-office-she-is--PU98U2Y.png" alt="" />
    <div class="overlay-container">
      <h3 class="text-white section-title">{{__('site.cazuri')}}</h3>
      <div class="breadcrumb-container">
        <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
        <div class="bara-verticala">|</div>
        <div class="breadcrumb-element">{{__('site.cazuri')}}</div>
      </div>
    </div>
  </div>
</section>

<section id="blog-nav">
  <div class="container">
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper nav-pills">
        @if (Request::path() == 'cazuri')
        <div class="swiper-slide">
          <a class="nav-link active" href="/cazuri}}" onclick="set_active();">{{__('site.toate-cazurile')}}</a>
        </div>
        @else
        <div class="swiper-slide">
          <a class="nav-link" href="/cazuri" onclick="set_active();">{{__('site.toate-cazurile')}}</a>
        </div>
        @endif
        @foreach($categorii_cazuri as $categorie)
        @if (\Request::path() == 'cazuri/'.$categorie->slug)
        <div class="swiper-slide">
          <a href="/cazuri/{{$categorie->slug}}" onclick="set_active();"
            class="nav-link active">{{$categorie->nume}}</a>
        </div>
        @else
        <div class="swiper-slide">
          <a href="/cazuri/{{$categorie->slug}}" onclick="set_active();" class="nav-link">{{$categorie->nume}}</a>
        </div>
        @endif
        @endforeach
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination" id="centered_pagination"></div>
    </div>
    <!-- end swiper -->
  </div>
</section>

<section id="articole">
  <div class="container container-articles">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>

    @foreach($cazuri as $caz)
    <a class="item" href="/caz/{{$caz->slug}}">
      @php
      $decoded_images = json_decode($caz->imagini, true);
      @endphp
      <img src="{{Voyager::image($decoded_images[0])}}" />

      <h3>{{$caz->titlu}}</h3>
     
      <p>
    
        @if(strlen($caz->descriere) > 200)
        {{substr($caz->descriere, 0, 200) . '...'}}
        @else
        {{$caz->descriere}}
        @endif
      </p>
    </a>
    @endforeach
  </div>
  <a id="button_to_top"></a>
</section>

@endsection

@push('scripts')
<script>
  var swiper = new Swiper(".swiper-container", {
    slidesPerView: 4,
    spaceBetween: 15,
    slidesPerGroup: 4,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1024: {
        slidesPerView: 4,
        spaceBetween: 10,
        slidesPerGroup: 4,
      },

      540: {
        slidesPerView: 3,
        spaceBetween: 10,
        slidesPerGroup: 3,
      },
      300: {
        slidesPerView: 2,
        spaceBetween: 10,
        slidesPerGroup: 2,
      },
    },
  });
</script>
@endpush