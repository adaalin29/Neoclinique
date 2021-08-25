@extends('parts.template')

@section('title', $oferta->titlu)

@section('content')

<div id="detalii_serviciu_page">
  <section id="articol-page-image" class="overflow-hidden">
    <div class="container">
      <!-- Swiper -->
      <div class="swiper-container s4">
        <div class="swiper-wrapper">

          @if($oferta->imagini)
          @foreach(json_decode($oferta->imagini) as $imagine)

          <div class="swiper-slide">
            <img src="{{Voyager::image($imagine)}}" alt="" class="img-fluid" />
          </div>
          @endforeach
          @endif
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>

    </div>
  </section>

  <section id="oferta_page_breadcrumb">
    <div class="container">
      <div class="breadcrumb-container">
        <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
        <div class="bara-verticala">|</div>
        <a href="/oferte" class="breadcrumb-element">{{__('site.oferte')}}</a>
        <div class="bara-verticala">|</div>
        <div class="breadcrumb-element">{{$oferta->titlu}}</div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="mt4 mb4">
            {{$oferta->titlu}}
          </h1>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-md-12 grey thin-text">
          {!!$oferta->continut!!}
        </div>
        <!-- end col-md-12 -->
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-md-12">
          <h6>{{__('site.distribuie-pe')}}:</h6>
          <div class="d-flex flex-row">
            <a class="facebookBtn smGlobalBtn" href="#"></a>
            <a class="twitterBtn smGlobalBtn" href="#"></a>
            <a class="linkedinBtn smGlobalBtn" href="#"></a>
          </div>
        </div>
        <!--  col-md-12 -->
      </div>
      <!--  row  -->
    </div>
    <!-- end container -->
  </section>


  <section class="programare-online mt4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="grey">{{__('site.programare-online')}}</h2>
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-12 mb4">
              <p class="grey text-center">
                {{__('site.text-programare')}}
              </p>
            </div>
          </div>
          <!-- end row -->
          <div class="row">
            <div class="col-md-4" id="first_element">
              <div class="mt10">
                <input type="text" class="form-control" placeholder="{{__('site.nume')}}" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="mt10">
                <input type="text" class="form-control" placeholder="{{__('site.prenume')}}" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="mt10">
                <input type="text" class="form-control" placeholder="{{__('site.telefon')}}" />
              </div>
            </div>
          </div>
          <!-- end row -->
          <div class="row">
            <div class="col-md-4">
              <div class="mt10">
                <input type="text" class="form-control" placeholder="Email" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="mt10">
                <select class="form-control" id="interesat_de">
                  <option value="" disabled selected>{{__('site.interesat-de')}} </option>
                  @foreach($servicii as $serviciu)
                  <option value="fatete">{{$serviciu->nume}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <!-- end col-md-4 -->
            <div class="col-md-2">
              <div class="mt20">
                <input type="text" class="form-control" placeholder="{{__('site.data')}}" id="data_programare" />
                <i class="fa fa-calendar" aria-hidden="true"></i>
              </div>
            </div>
            <div class="col-md-2">
              <div class="mt20">
                <input type="text" class="form-control" placeholder="{{__('site.ora')}}" id="ora_programare" />
                <i class="fa fa-clock-o" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <!-- end row -->
          <div class="row">
            <div class="col-md-12">
              <div class="mt4">
                <input type="text" placeholder="{{__('site.mesaj')}}" class="form-control" />
              </div>
            </div>
          </div>
          <!-- end row -->
          <div class="row">
            <div class="col-md-12">
              <div class="mt4 text-center">
                <input type="checkbox" id="acord" class="rounded-checkbox" />
                <label for="acord" class="light-text grey">{{__('site.sunt-de-acord-tc')}}</label>
              </div>
            </div>
          </div>
          <!-- end row -->
          <div class="row">
            <div class="col-md-12">
              <div class="mt4">
                <button class="btn btn-primary">{{__('site.programeaza-te')}}</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end col-md-12 -->
        <div class="col-md-2"></div>
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>

  <a id="button_to_top"></a>
</div>
@endsection

@push('scripts')
<script>
  var swiper2 = new Swiper(".swiper-container", {
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 10,
        slidesPerGroup: 3,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 10,
        slidesPerGroup: 2,
      },
      420: {
        slidesPerView: 1,
        spaceBetween: 0,
        slidesPerGroup: 1,
      },
      300: {
        slidesPerView: 1,
        spaceBetween: 0,
        slidesPerGroup: 1,
      },
    },
  });

  var swiper = new Swiper(".swiper-container.s4", {
    spaceBetween: 0,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  $(function () {
    $("#data_programare").datepicker();
    $("#ora_programare").timepicker();
  });
</script>
@endpush