@extends('parts.template')

@section('title', 'Blog')

@section('content')


<section id="blog-page-image" class="overflow-hidden">
  <div class="grey-overlay">
    <img src="img/woman-patient-PMQSKAN.png" alt="" />
    <div class="overlay-container">
      <h3 class="text-white section-title">{{__('site.blog')}}</h3>
      <div class="breadcrumb-container">
        <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
        <div class="bara-verticala">|</div>
        <div class="breadcrumb-element">{{__('site.blog')}}</div>
      </div>
    </div>
</section>

<section id="blog-nav">
  <div class="container">
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper nav-pills">
        @if (Request::path() == 'blog')
        <div class="swiper-slide">
          <a class="nav-link active" href="/blog" onclick="set_active();">{{__('site.toate-blog')}}</a>
        </div>
        @else
        <div class="swiper-slide">
          <a class="nav-link" href="/blog" onclick="set_active();">{{__('site.toate-blog')}}</a>
        </div>
        @endif
        @foreach($categorii_blog as $categorie)
        @if (\Request::path() == 'blog/'.$categorie->slug)
        <div class="swiper-slide">
          <a href="/blog/{{$categorie->slug}}" onclick="set_active();" class="nav-link active">{{$categorie->nume}}</a>
        </div>
        @else
        <div class="swiper-slide">
          <a href="/blog/{{$categorie->slug}}" onclick="set_active();" class="nav-link">{{$categorie->nume}}</a>
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

    @foreach($articole as $articol)
    <a class="item" href="/articol/{{$articol->slug}}">
      @php
      $decoded_images = json_decode($articol->imagini, true);
      @endphp
      <img src="{{Voyager::image($decoded_images[0])}}" />

      <h3>{{$articol->titlu}}</h3>
      <p>
        @if(strlen($articol->descriere) > 200)
        {{substr($articol->descriere, 0, 350) . '...'}}
        @else
        {{$articol->descriere}}
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
      400: {
        slidesPerView: 2,
        spaceBetween: 10,
        slidesPerGroup: 2,
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