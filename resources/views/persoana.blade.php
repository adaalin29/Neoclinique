@extends('parts.template')
@section('title', $persoana->nume)

@section('content')

<div id="detaliu_echipa_page">
  <section id="echipa-detaliu-image" class="overflow-hidden">
    <div class="grey-overlay">
      <img src="img/woman-patient-PMQSKAN.png" alt="" />

      <div class="overlay-container">
        <div class="breadcrumb-container">
          <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
          <div class="bara-verticala">|</div>
          <a href="/echipa" class="breadcrumb-element">{{__('site.echipa')}}</a>
          <div class="bara-verticala">|</div>
          <div class="breadcrumb-element">{{$persoana->nume}}</div>
        </div>
      </div>
    </div>
  </section>
  <section class="mt8">
    <div class="container">
      <div class="row">
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <img src="{{Voyager::image($persoana->imagine)}}" alt="" class="echipa-detaliu-thumb" />
        </div>
        <div class="col-md-8" id="descriere-medic">
          <h2>{{$persoana->nume}}</h2>
          <p>{!!str_replace("\n","</br>",$persoana->specializare)!!}</p>
          <p>{!!str_replace("\n","</br>",$persoana->continut)!!}</p>
        </div>
      </div>
      <div class="row mt4">
        <div class="col-md-12">
          <div class="horizontal_line"></div>
        </div>
      </div>
    </div>
  </section>

  <section id="echipa-testimoniale" class="mt5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>{{__('site.testimoniale')}}</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
          <!-- Swiper -->
          <div class="swiper-container s2">
            <div class="swiper-wrapper">
              @foreach($testimoniale as $testimonial)
              <div class="swiper-slide">
                <h4 class="testimonial_opinie mt5">{{$testimonial->titlu}}</h4>
                <p class="testimonial_descriere mt5 thin-text">
                  {{$testimonial->mesaj}}
                </p>
                <div class="testimonial_persoana d-flex flex-row">
                  <img src="img/70.png" alt="" class="rounded-circle mt5" width="62" height="62" />
                  <p class="regular-text grey">{{$testimonial->titlu}}</p>
                </div>
              </div>
              @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
          </div>
          <!-- swiper -->
        </div>
        <!-- col-md-8 -->
      </div>
      <div class="col-md-2"></div>
      <!-- row -->
    </div>
  </section>

  <section id="cazuri-medic">
    <div class="container">
      <div class="row mb4">
        <div class="col-md-12 text-center">
          <h2>{{__('site.cazuri-participat')}}</h2>
        </div>
      </div>
      <div class="row text-center justify-content-center">
        @foreach($cazuri->take(3) as $caz)
        <div class="col-md-4" onClick="location.href = '/caz/{{$caz->slug}}'">
          @php
          $decoded_photos = json_decode($caz['imagini'],true);
          @endphp
          <img src="{{Voyager::image($decoded_photos[0])}}" alt="" class="img-fluid" />
          <h4 class="grey">{{$caz->titlu}}</h4>
          <p class="light-text grey">
            @if(strlen($caz->descriere) > 200)
            <p>{{substr($caz->descriere, 0, 400) . '...'}}</p>
            @else
            <p>{{$caz->descriere}}</p>
            @endif
          </p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="programare-online mt4 mb4">
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
              <p class="grey text-center light-text">
                {{__('site.text-programare')}}
              </p>
            </div>
          </div>
          <!-- end row -->
          <div class="row">
            <div class="col-md-4">
              <div class="mt10">
                <input id="nume" type="text" class="form-control" placeholder="{{__('site.nume')}}" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="mt10">
                <input id="prenume" type="text" class="form-control" placeholder="{{__('site.prenume')}}" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="mt10">
                <input id="telefon" type="text" class="form-control" placeholder="{{__('site.telefon')}}" />
              </div>
            </div>
          </div>
          <!-- end row -->
          <div class="row">
            <div class="col-md-4">
              <div class="mt10">
                <input id="email" type="text" class="form-control" placeholder="Email" />
              </div>
            </div>
            <input type = "hidden" id = "persoana" value = "{{$persoana->nume}}">
            <div class="col-md-4">
              <div class="mt10">
                <select class="form-control" id="interesat_de">
                  <option value="" disabled selected>{{__('site.interesat-de')}}</option>
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
              <div class="mt4 mt10-mobile">
                <input id="mesaj" type="text" placeholder="{{__('site.mesaj')}}" class="form-control" />
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
                <button onclick="trimite_formular();" class="btn btn-primary">{{__('site.buton-programeaza')}}</button>
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
  // var swiper2 = new Swiper(".swiper-container", {
  //   slidesPerView: 3,
  //   spaceBetween: 30,
  //   navigation: {
  //     nextEl: ".swiper-button-next",
  //     prevEl: ".swiper-button-prev",
  //   },
  //   breakpoints: {
  //     1024: {
  //       slidesPerView: 3,
  //       spaceBetween: 10,
  //       slidesPerGroup: 3,
  //     },
  //     768: {
  //       slidesPerView: 2,
  //       spaceBetween: 10,
  //       slidesPerGroup: 2,
  //     },
  //     420: {
  //       slidesPerView: 1,
  //       spaceBetween: 0,
  //       slidesPerGroup: 1,
  //     },
  //     300: {
  //       slidesPerView: 1,
  //       spaceBetween: 0,
  //       slidesPerGroup: 1,
  //     },
  //   },
  // });
  var swiper = new Swiper(".swiper-container", {
    slidesPerView: 1,
    spaceBetween: 0,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  $(function () {
    $("#data_programare").datepicker();
    $("#ora_programare").timepicker();
  });
</script>
@endpush