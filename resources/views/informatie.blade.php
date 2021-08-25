@extends('parts.template')

@section('title', $informatie->nume)

@section('content')

<div id="articol_page">
  <section id="articol-page-image" class="overflow-hidden">
    <div class="container">
      <div class="grey-overlay">
        <?php
            $decoded_images = json_decode($informatie->imagini, true);
        ?>
        
        <img src="{{Voyager::image($decoded_images[0])}}" alt="" class="img-fluid" />

        <!-- <div class="overlay-container small-padding">
         
        </div> -->

      </div>
      <div class="breadcrumb-container">
            <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
            <div class="bara-verticala">|</div>
            <a href="/infos" class="breadcrumb-element">{{__('site.info')}}</a>
            <div class="bara-verticala">|</div>
            <div class="breadcrumb-element">{{$informatie->nume}}</div>
          </div>
    </div>
  </section>

  <section>
    <div class="container pl-4 pt-4">
      <div class="row text-center">
        <div class="col-md-12">
          <h1 class="mb-4 mt-4">
            {{$informatie->nume}}
          </h1>
        </div>
        <!-- col-md-12 -->
      </div>
      <!--  row -->
      <div class="row">
        <div class="col-md-12 grey">
          <p>
            {!!$informatie->descriere!!}
          </p>
        </div>
        <!-- col-md-12 -->
      </div>
      <!--  row -->
      <div class="row">
        <div class="col-md-12">
          <h6>{{__('site.distribuie-pe')}}:</h6>
          <div class="d-flex flex-row">
            <a class="facebookBtn smGlobalBtn" href="{{settings('site.facebook')}}"></a>
            <a class="twitterBtn smGlobalBtn" href="{{settings('site.twitter')}}"></a>
            <a class="linkedinBtn smGlobalBtn" href="{{settings('site.linkedin')}}"></a>
          </div>
        </div>
        <!--  col-md-12 -->
      </div>
      <!--  row  -->
    </div>
    <!-- container -->
  </section>

  <section id="swipper-articol" class="mt4 mb4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3>
            {{__('site.alte-informatii-utile')}}
          </h3>
        </div>
      </div>
      <div class  = "info-container">
        <?php
            foreach($informatii_multiple as $informatie_multipla){
                $decoded_images = json_decode($informatie_multipla->imagini, true);
              ?>
                    <div class = "info-item">
                      <div class = "info-image">
                        <img src="{{Voyager::image($decoded_images[0])}}" alt="" class="img-fluid full-width"/>
                      </div>
                      <div class="info-descriere">
                      <h4>{{$informatie_multipla->nume}}</h4>
                      <p>
                          {{$informatie_multipla->short}}
                        </p>
                        <a href="/info/{{$informatie_multipla->slug}}"
                          ><span class="linie_link"></span> Citeste mai mult</a >
                      </div>
                    </div>
              <?php
            }

      ?>
      </div>
    </div>
  </section>
  <a id="button_to_top"></a>
</div>
@endsection

@push('scripts')
<script>
  var swiper2 = new Swiper(".swiper-container", {
    slidesPerView: 4,
    spaceBetween: 30,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1200: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      420: {
        slidesPerView: 2,
        spaceBetween: 5,
      },
      300: {
        slidesPerView: 1,
        spaceBetween: 5,
      },
      200: {
        slidesPerView: 1,
        spaceBetween: 0,

      },
    },
  });
</script>
@endpush