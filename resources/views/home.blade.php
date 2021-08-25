@extends('parts.template')
@section('title', settings('admin.homepage_title'))
@section('site_description',settings('admin.homepage_description'))
@section('keywords',settings('admin.homepage_keywords'))
@section('content')

<div id="homepage">
  <section id="home_page_image" class="mt-2">
    <img src="img/Group 2523.png" alt="" class="img-fluid" />
    <a href=""><img src="img/phone.svg" alt="" class="phone" /></a>
  </section>

  <section>
    <div class="container">
      <!-- Swiper -->
      <div class="swiper-container s3 d-inline-block align-baseline">
        <div class="swiper-wrapper nav-pills">
          @foreach($servicii as $serviciu)
          <div class="swiper-slide" onclick="location.href='/servicii/{{$serviciu->slug}}'">
            <img src="{{Voyager::image($serviciu->icon)}}" alt="" />
            <p>{{$serviciu->nume}}</p>
          </div>
          @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
      </div>
      <!-- end swiper -->
    </div>
    <!-- container-->
  </section>

  <section id="tratamente_homepage" class="mt5">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h1>
            Oferte
          </h1>
        </div>
        <!-- col-md-12-->
      </div>
      <!-- row-->
      <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <p class="grey thin-text two-lines-text">
            {{settings('admin.static_oferte_homepage')}}
          </p>
        </div>
        <div class="col-md-3"></div>
      </div>
      <!-- row -->
      <div class="row" id="row-desktop">
        <div class="col-md-4">
          <div class="container_image">
            <div class="content high_image2">
              <div class="content-overlay"></div>
              @php
              $decoded_images = json_decode($oferte[0]->imagini, true);
              @endphp
              <img class="content-image img-fluid" src="{{Voyager::image($decoded_images[0])}}" />
              <div class="content-details fadeIn-top">
                <h2 class="text-white">{{$oferte[0]->titlu}}</h2>
                <p>
                  {{$oferte[0]->descriere}}
                </p>
                <button onclick="location.href='/oferte/{{$oferte[0]->slug}}'"
                  class="btn btn-primary custom-button medium-blue mt-5">
                  {{__('site.vezi-detalii')}}
                </button>
              </div>
              <!-- content details -->
            </div>
            <!-- content -->
          </div>
          <!-- container-image -->
        </div>
        <!-- col -->
        @if(!empty($oferte[1]))
        <div class="col-md-4" onclick="location.href='/oferte/{{$oferte[1]->slug}}'">
          @php
          $decoded_images = json_decode($oferte[1]->imagini, true);
          @endphp
          <img src="{{Voyager::image($decoded_images[0])}}" alt="" class="img-fluid home_image" />

          <h4 class="mt5 grey">

            {{$oferte[1]->titlu}}
          </h4>
          <p class="grey light-text">
            {{$oferte[1]->descriere}}
          </p>
        </div>
        @endif
        @if(!empty($oferte[2]))
        <div class="col-md-4" onclick="location.href='/oferte/{{$oferte[2]->slug}}'">
          @php
          $decoded_images = json_decode($oferte[2]->imagini, true);
          @endphp
          <img src="{{Voyager::image($decoded_images[0])}}" alt="" class="img-fluid home_image" />
          <h4 class="mt5 grey">
            {{$oferte[2]->titlu}}
          </h4>
          <p class="grey light-text">
            {{$oferte[2]->descriere}}
          </p>
        </div>
        @endif
      </div>
      <!-- row -->
      <div class="swiper-mobile">
        <!-- Swiper -->
        <div class="swiper-container s4">
          <div class="swiper-wrapper">
            @foreach($oferte->take(3) as $oferta)
            <div class="swiper-slide animated-link">
              @php
              $decoded_images = json_decode($oferta->imagini, true);
              @endphp
              <img src="{{Voyager::image($decoded_images[0])}}" alt="" class="img-fluid" />

              <h4>{{$oferta->titlu}}</h4>
              <p>
                {{$oferta->descriere}}
              </p>
              <a href="/oferte/{{$oferta->slug}}">
                <p><span class="linie_link"></span> {{__('site.citeste-mai-multe')}}</p>
              </a>
            </div>
            @endforeach
          </div>
          <!-- swiper -->
          <!-- Add Arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        <!-- swiper-coontainer -->
      </div>
    </div>
    <!-- container -->
  </section>

  <section id="testimoniale_homepage" class="mt5">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12">
        <div data-aos="fade-right" data-aos-duration="1000">

          <h1 class="mt5">{{__('site.testimoniale')}}</h1>
          <!-- Swiper -->
          <div class="swiper-container s1">
            <div class="swiper-wrapper">
              @foreach($testimoniale as $testimonial)
              <div class="swiper-slide">
                <h4 class="testimonial_opinie mt5">{{$testimonial->titlu}}</h4>
                <p class="testimonial_descriere mt5 thin-text">
                  {{$testimonial->mesaj}}
                </p>
                <div class="testimonial_persoana d-flex flex-row">
                  <img src="img/70.png" alt="" class="rounded-circle mt5" width="62" height="62" />
                  <p class="regular-text grey">{{$testimonial->nume}}</p>
                </div>
              </div>
              @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination1"></div>
          </div>
          <!-- swiper -->
        </div>
        <!-- col-md-6 -->
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12">
      
          <div class="formular-rezervare">
            <div class="formular-rezervare-content text-white p-5">
              <h1>{{__('site.formular-rezervari')}}</h1>
              <p>
                {{__('site.text-programare')}}
              </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt10">
                    <input id="nume" type="text" class="form-control" placeholder="{{__('site.nume')}}" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt10">
                    <input id="prenume" type="text" class="form-control" placeholder="{{__('site.prenume')}}" />
                  </div>
                </div>
                <!-- mb5-->
              </div>
              <!-- row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="mt10">
                    <input id="telefon" type="text" class="form-control" placeholder="{{__('site.telefon')}}" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt10">
                    <input id="email" type="text" class="form-control" placeholder="Email" />
                  </div>
                </div>

                <!-- mt10 -->
              </div>
              <!-- row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="mt10">
                    <select class="form-control" id="interesat_de">
                      <option value="" disabled selected>{{__('site.interesat-de')}}
                      </option>
                      @foreach($servicii as $serviciu)
                      <option value="<?php echo $serviciu->nume;?>">{{$serviciu->nume}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <!-- col-md-6-->
                <div class="col-md-3">
                  <div class="mt20">
                    <input type="text" class="form-control" placeholder="{{__('site.data')}}" id="data_programare" />
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                </div>
                <!-- col-md-md-3 -->
                <div class="col-md-3">
                  <div class="mt20">
                    <input type="text" class="form-control" placeholder="{{__('site.ora')}}" id="ora_programare" />
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                  </div>
                </div>
                <!-- col-md-3-->
              </div>
              <!--row-->
              <div class="row">
                <div class="col-md-12">
                  <div class="mt10">
                    <input id="mesaj" type="text" placeholder="{{__('site.mesaj')}}" class="form-control" />
                  </div>
                </div>
                <!-- col-md-12 -->
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mt10">
                    <input type="checkbox" id="acord" class="rounded-checkbox" />
                    <label for="acord" class="d-inline"> <a href="/termeni-si-conditii" class="text-white">
                        {{__('site.sunt-de-acord-tc')}}
                      </a></label>
                  </div>
                </div>
                <!-- col-md-12 -->
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="mt10">
                    <button class="custom-button" onclick="trimite_formular();">
                      {{__('site.programeaza-te')}}
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- formular-rezervare-content -->
          </div>
          <!-- formular-rezervare -->
      
</div>
        <!-- col-md-6-->
      </div>
      <!-- row -->
    </div>
    <!-- container-->
  </section>
  <!-- section testimoniale-->

  <section id="galerie_homepage" class="mt10">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <!-- <div class="grey-overlay" id="img1">
              <img src="img/beautiful-young-model.png" alt="" class="img-fluid" />
              <h1>
                Experiente
              </h1>
              <p>de neuitat!</p>
            </div> -->
          <div class="container_image">
            <div data-aos="zoom-in-up" data-aos-delay="250"  data-aos-duration="1000"  data-aos-easing="ease-out-cubic">
              <div class="content " onClick="location.href = '{{$card[0]->link}}'">
                <div class="content-overlay grey-overlay"></div>
                <img class="content-image high_image" src="{{Voyager::image($card[0]->imagine)}}" />
                <div class="content-details fadeIn-left text-white">
                  <h1>
                    {{$card[0]->titlu}}
                  </h1>
                  <p>{{$card[0]->continut}}</p>
                </div>
                <!-- content details -->
              </div>
            </div>
            <!-- content -->
          </div>
          <!-- container-image -->
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6">
              <div class="container_image">
                <div class="code code--small code--left h-100" data-aos="zoom-in-up" data-aos-delay="100"  data-aos-duration="1000" data-aos-easing="ease-out-cubic">
                  <div class="content" onClick="location.href = '{{$card[2]->link}}'">
                    <div class="content-overlay grey-overlay"></div>

                    <img class="content-image home_image" src="{{Voyager::image($card[2]->imagine)}}" />

                    <div class="content-details fadeIn-top text-white">
                      <h1>{{$card[2]->titlu}}</h1>
                      <p>{{$card[2]->continut}}</p>
                    </div>
                    <!-- content details -->
                  </div>
                </div>
                <!-- content -->

              </div>
              <!-- container-image -->
            </div>

            <div class="col-md-6">
              <div class="container_image"> 
                <div class="code code--small code--left h-100" data-aos="zoom-in-up" data-aos-delay="750"  data-aos-duration="1000"   data-aos-easing="ease-out-cubic">

                  <div class="content" onClick="location.href = '{{$card[3]->link}}'">
                    <div class="content-overlay grey-overlay"></div>
                    <img class="content-image home_image" src="{{Voyager::image($card[3]->imagine)}}" />
                    <div class="content-details fadeIn-top text-white">
                      <h1>{{$card[3]->titlu}}</h1>
                      <p>{{$card[3]->continut}}</p>
                    </div>
                    <!-- content details -->
                  </div>

                </div>
                <!-- content -->
              </div>
              <!-- container-image -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mt4">
                <div class="container_image">
                  <div class="code code--small code--left h-100" data-aos="zoom-in-up" data-aos-delay="1000"  data-aos-duration="1000"   data-aos-easing="ease-out-cubic"> 

                    <div class="content" onClick="location.href = '{{$card[1]->link}}'">
                      <div class="content-overlay"></div>
                      <img class="content-image" src="{{Voyager::image($card[1]->imagine)}}" />
                      <div class="content-details fadeIn-bottom text-white">
                        <h1>{{$card[1]->titlu}}</h1>
                        <p>
                          {{$card[1]->continut}}
                        </p>
                        <a href="{{$card[1]->link}}">{{__('site.citeste-mai-multe')}}</a>
                      </div>
                      <!-- content details -->
                    </div>
                  </div>

                  <!-- content -->
                </div>
                <!-- container-image -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="informatii_utile_homepage" class="mt4 mb4">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h1>{{__('site.informatii-utile')}}</h1>
        </div>
      </div>
      <!-- row-->

      <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
<!--           <p class="thin-text two-lines-text">
            {{settings('admin.staic_info_homepage')}}
          </p> -->
        </div>
        <div class="col-md-3"></div>
      </div>
      <!-- row-->

      <!-- swiper-->
      <div class="swiper-container s2" id="info_utile_homepage">
        <div class="swiper-wrapper animated-link">
          <?php
                 foreach($informatii as $informatie){
                     $decoded_images = json_decode($informatie->imagini, true);
                   ?>
          <div class="swiper-slide">

            <img src="{{Voyager::image($decoded_images[0])}}" alt="" class="img-fluid" />
            <div class="descriere-articol">
              <h4>{{$informatie->nume}}</h4>
              <p>
                {{$informatie->short}}
              </p>
              <a href="/info/{{$informatie->slug}}"><span class="linie_link"></span> Citeste mai mult</a>
            </div>
          </div>
          <?php
                 }

            ?>

        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>

  <a id="button_to_top"></a>
</div>
@endsection

@push('scripts')

<script>
  AOS.init({
    duration: 1200,
  });
  var swiper = new Swiper(".swiper-container.s1", {
    slidesPerView: 1,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: false,
    pagination: {
      el: ".swiper-pagination1",
      clickable: true,
    },
  });

  var swiper = new Swiper(".swiper-container.s3", {
    slidesPerView: 5,
    spaceBetween: 30,
    slidesPerGroup: 5,
    loop: false,
    loopFillGroupWithBlank: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
    delay: 5000,
     },
    breakpoints: {
      1024: {
        slidesPerView: 5,
        spaceBetween: 20,
        slidesPerGroup: 5,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 10,
        slidesPerGroup: 3,
      },
      420: {
        slidesPerView: 2,
        spaceBetween: 0,
        slidesPerGroup: 2,
      },
      300: {
        slidesPerView: 2,
        spaceBetween: 0,
        slidesPerGroup: 2,
      },
      200: {
        slidesPerView: 1,
        spaceBetween: 0,
        slidesPerGroup: 1,
      },
    },
  });

  var swiper2 = new Swiper(".swiper-container.s2", {
    slidesPerView: 1,
    spaceBetween: 0,
    centerSlides:true,
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
      600: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      
    },
  });
  var swiper2 = new Swiper(".swiper-container.s4", {
    slidesPerView: 2,
    spaceBetween: 20,
    slidesPerGroup: 2,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {

      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      420: {
        slidesPerView: 1,
        spaceBetween: 5,
        slidesPerGroup: 1,
      },
      300: {
        slidesPerView: 1,
        spaceBetween: 5,
        slidesPerGroup: 1,
      },
      200: {
        slidesPerView: 1,
        spaceBetween: 0,
        slidesPerGroup: 1,

      },
    },
  });

  $(function () {
    $("#data_programare").datepicker();
    $("#ora_programare").timepicker();
  });
</script>
@endpush