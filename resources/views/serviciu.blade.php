@extends('parts.template')

@section('title',)
@section('site_description',settings('admin.servicii_description'))
@section('keywords',settings('admin.servicii_keywords'))

@section('content')

<div id="detalii_serviciu_page">
  <section id="articol-page-image" class="overflow-hidden">
    <div class="container">
      <!-- Swiper -->
      <div class="swiper-container s4">
        <div class="swiper-wrapper">

          @if($serviciu->imagini)
          @foreach(json_decode($serviciu->imagini) as $imagine)

          <div class="swiper-slide">
            <img src="{{Voyager::image($imagine)}}" alt="" class="img-fluid" />
          </div>
          @endforeach
          @endif
          @if($serviciu->video)
          @foreach(json_decode($serviciu->video) as $vid)
          @php
          $link = $vid;
          $link = explode('watch?v=', $link);
          if(count($link) > 1){
          $link = explode('&', $link[1]);
          $link = $link[0];
          }else{
          $link = $link[0];
          echo $link;
          }
          $link = 'https://www.youtube.com/embed/'.$link;

          @endphp
          <div class="swiper-slide">
            <iframe id="iframe-video" src="{{$link}}" frameborder="0" allow="autoplay; encrypted-media"
              allowfullscreen></iframe>
          </div>
          @endforeach
          @endif
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
      <img src="img/phone.svg" alt="" class="phone" />
    </div>
  </section>

  <section id="serviciu_breadcrumb">
    <div class="container">
      <div class="breadcrumb-container">
        <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
        <div class="bara-verticala">|</div>
        <a href="/servicii" class="breadcrumb-element">{{__('site.servicii')}}</a>
        <div class="bara-verticala">|</div>
        <div class="breadcrumb-element">{{$serviciu->nume}}</div>
      </div>
    </div>
  </section>

  <section>
    <div class="container pl-4">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="mt4 mb4">
            {{$serviciu->nume}}
          </h1>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-md-12 grey thin-text">
          {!!$serviciu->continut!!}
        </div>
        <!-- end col-md-12 -->
      </div>
      <!-- end row -->
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
    <!-- end container -->
  </section>



  <section id="swipper-detalii-serviciu" class="mt4 mb4">
    <div class="container">
         <?php
            if(count($echipa) == 0)
            {
               // echo '<p>Nu exista date inserate</p>';
            }
            else
            {
              ?>
              <div class="row">
                  <div class="col-md-12 text-center">
                      <h2 class="grey mb-4">Echipa implicata</h2>
                  </div><!-- /.col-md-12 -->
              </div><!-- /.row -->
                  <div class="swiper-container s2">
                    <div class="swiper-wrapper animated-link">
              <?php
               foreach($echipa as $persoana)
               {
                 ?>
                      <div class="swiper-slide animated-link">
                        <div class="card">
                           <img src="{{Voyager::image($persoana->imagine)}}" alt="" class="echipa-thumb" />
                            <h4 class="grey">
                                <?php echo $persoana->nume ?>
                            </h4>
                            <p class="grey light-text"></p>
                            <a href="/membru/{{$persoana->slug}}">
                                <p><span class="linie_link"></span>Citeste mai mult</p>
                            </a>
                        </div><!-- /.card -->
                      </div><!-- /.swiper - slide -->
                <?php
               }
               ?>
                    </div> <!-- /.swiper-wrapper -->

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                  </div> <!-- /.swiper-container -->
               <?php
            }
         ?>

    </div><!-- /.container -->
  </section>

  <section id="tarife_serviciu">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <?php 
            foreach($serviciu->tarife as $tarif)
                {
                  ?>
        <div class="col-md-3" onclick="redirect_tarif('<?php echo $tarif->slug; ?>');">
          <div class="categorie">
            <?php echo $tarif->nume; ?>
          </div>
        </div>
        <?php
                }

        ?>
      </div>
    </div>
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
  var swiper2 = new Swiper(".swiper-container.s2", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: false,
    navigation: {
      nextEl: ".s2 .swiper-button-next",
      prevEl: ".s2 .swiper-button-prev",
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
      
    },
  });

  var swiper = new Swiper(".swiper-container.s4", {
    spaceBetween: 0,
    // centeredSlides: true,
    slidesPerView: 1,
    loop: true,
    slidesPerGroup: 1,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },

    navigation: {
      nextEl: ".s4 .swiper-button-next",
      prevEl: ".s4 .swiper-button-prev",
    },
  });
  $(function () {
    $("#data_programare").datepicker();
    $("#ora_programare").timepicker();
  });

  // var $li = $('#tarife_serviciu .categorie').click(function () {
  //       $li.removeClass('selected');
  //       $(this).addClass('selected');
  //   });
</script>
@endpush