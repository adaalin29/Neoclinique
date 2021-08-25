@extends('parts.template')

@section('title', $caz->titlu)

@section('content')
<section id="caz">

  <div class="container">
    <img src="img/thumb(1).png" alt="" class="caz-first-image">

    <div class="breadcrumb-container">
      <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
      <div class="bara-verticala">|</div>
      <a href="/cazuri" class="breadcrumb-element">{{__('site.cazuri')}}</a>
      <div class="bara-verticala">|</div>
      <div class="breadcrumb-element">{{$caz->titlu}}</div>
    </div>

    <div class="row mt-3 mt-md-5">
      <div class="col-md-12 text-center">
        <h1>{{$caz->titlu}}</h1>
      </div>
    </div> <!-- end row -->

    <div class="row">
      <div class="col-md-12">
        <p class="light-text">
          {!!$caz->continut!!}
        </p>
      </div>
    </div> <!-- end row  -->

    <div class="row mt-3 mt-md-5 mb-4">
      <div class="col-md-4">
        <img src="img/thumb.png" alt="" class="caz-image">
      </div>
      <div class="col-md-4">
        <img src="img/thumb (2).png" alt="" class="caz-image">
      </div>
      <div class="col-md-4">
        <img src="img/thumb (3).png" alt="" class="caz-image">
      </div>
    </div><!-- end row  -->

      <?php

          foreach(json_decode($caz->video) as $vid)
            {
                  $link = $vid;
                  $link = explode('watch?v=', $link);

                  if(count($link) > 1)
                  {
                    $link = explode('&', $link[1]);
                    $link = $link[0];
                  }
                  else
                  {
                    $link = $link[0];
                  }
                  $link = 'https://www.youtube.com/embed/'.$link;
                  ?>
                  <div class="row">
                      <div class="col-lg-12">
                          <iframe src="<?php echo $link;?>" frameborder="0"
                                 allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                         </iframe>
                      </div>
                  </div>
                
                  <?php
            }
      ?>


    <div class="row mt-4">
      <div class="col-md-6">
         <img src="img/thumb (5).png" alt="" class="caz-image">
      </div>
      <div class="col-md-6">
          <img src="img/thumb(1).png" alt="" class="caz-image">
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-12">
         <img src="img/thumb (4).png" alt="" class="caz-first-image">
      </div>
    </div>
  </div><!-- end container  -->

  <section id="tarife_serviciu">
      <div class="container">
      <div class="row my-3">
          <div class="col-lg-12 text-center">
             <h2>Tarife</h2>
          </div>
        </div>
        <div class="row justify-content-center align-items-center">
          <?php 
              foreach($caz->tarife as $tarif)
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

  <section class="programare-online mt4" id="programare_caz">
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
              <input id="mesaj" type="text" placeholder="{{__('site.mesaj')}}" class="form-control" />
            </div>
          </div>
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-md-12">
            <div class="mt4 text-center">
              <input type="checkbox" id="acord" class="rounded-checkbox" />
              <label for="acord"  class="light-text grey"><a href="/termeni-si-conditii" class="light-text grey">
                {{__('site.sunt-de-acord-tc')}}
                </a></label>
            </div>
          </div>
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-md-12">
            <div class="mt4">
              <button onclick="trimite_formular();" class="btn btn-primary">{{__('site.programeaza-te')}}</button>
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
</section>
@endsection

@push('scripts')
<script>
  var swiper2 = new Swiper("#swiper_caz", {
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
        slidesPerGroup: 2,
      },
      200: {
        slidesPerView: 1,
        spaceBetween: 20,
        slidesPerGroup: 1,
      },

    }
  });
  var galleryThumbs = new Swiper('#swiper_down', {
    spaceBetween: 10,
    slidesPerView: 5,
    loop: false,
    freeMode: true,
    // loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    autoplay: {
      delay: 5000,
    },
  });
  var galleryTop = new Swiper('#swiper_up', {
    spaceBetween: 10,
    loop: false,
    // loopedSlides: 5, //looped slides should be the same
    navigation: {
      nextEl: '#thumb-arrow-next',
      prevEl: '#thumb-arrow-prev',
    },
    thumbs: {
      swiper: galleryThumbs,
    },
    autoplay: {
      delay: 5000,
    },
  });

  var $li = $('#tarife_serviciu .categorie').click(function () {
    $li.removeClass('selected');
    $(this).addClass('selected');
  });

  $(function () {
    $("#data_programare").datepicker();
    $("#ora_programare").timepicker();
  });


  $("#btn_programeaza").click(function () {
    $("html, body").animate({
        scrollTop: $("#programare_caz").offset().top,
      },
      1500
    );
  });

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
</script>
@endpush