@extends('parts.template')

@section('title', 'Oferte')

@section('content')


<div id="oferte_page">
  <section id="oferte-page-image" class="overflow-hidden">
    <div class="grey-overlay">
      <img src="img/11714.png" alt="" />
      <div class="overlay-container">
        <h3 class="text-white section-title">{{__('site.oferte')}}</h3>
        <div class="breadcrumb-container">
          <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
          <div class="bara-verticala">|</div>
          <div class="breadcrumb-element">{{__('site.oferte')}}</div>
        </div>
      </div>
    </div>
  </section>

  <section id="oferte-section">
    <div class="container">
      <?php
            $i = 0;
            foreach($oferte as $oferta){
      if($i % 2 == 0){
      $decoded_photos = json_decode($oferta['imagini'],true);
        ?>
      <div class="row grey_background mt4">
        <div class="col-md-5 no_padding">
          <div class="code code--small code--left h-100" data-aos="zoom-in-up" data-aos-delay="250">
            <img src="{{Voyager::image($decoded_photos[0])}}" alt="" class="image_cover" />
          </div>
        </div>
        <div class="col-md-7">
          <div class="p80 descriere_serviciu animated-link">
            <h2>{{$oferta->titlu}}</h2>

            <p class="grey">
              @if(strlen($oferta->descriere) > 200)
              {{substr($oferta->descriere, 0, 350) . '...'}}
              @else
              {{$oferta->descriere}}
              @endif
            </p>
            <a href="/oferte/{{$oferta->slug}}">
              <p><span class="linie_link"></span> {{__('site.citeste-mai-multe')}}</p>
            </a>
          </div>
        </div>
        <!-- col-md-7 -->
      </div>
      <!-- row  -->
      <?php
    }
    else{
      $decoded_photos = json_decode($oferta['imagini'],true);
      ?>
      <div class="row grey_background mt4">
        <div class="col-md-7" id="after-img3">
          <div class="p80 descriere_serviciu animated-link">
            <h2>{{$oferta->titlu}}</h2>

            <p class="grey">
              @if(strlen($oferta->descriere) > 200)
              {{substr($oferta->descriere, 0, 350) . '...'}}
              @else
              {{$oferta->descriere}}
              @endif
            </p>
            <a href="/oferte/{{$oferta->slug}}">
              <p><span class="linie_link"></span> {{__('site.citeste-mai-multe')}}</p>
            </a>
          </div>
        </div>
        <div class="col-md-5 no_padding" id="img3">
          <div class="code code--small code--left h-100" data-aos="zoom-in-up" data-aos-delay="250">
            <img src="{{Voyager::image($decoded_photos[0])}}" alt="" class="image_cover" />
          </div>
        </div>
        <!-- col-md-7 -->
      </div>
      <!-- row  -->
      <?php
    }
    $i++;
    }
?>
    </div>
    <!-- container -->
  </section>
  <section id="testimoniale-oferte" class="mb8 mt4">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="mt5">{{__('site.testimoniale')}}</h1>
          <!-- Swiper -->
          <div class="swiper-container">
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
        <!-- col-md-6 -->
        <div class="col-md-6">
          <div class="formular-rezervare">
            <div class="formular-rezervare-content text-white p-5">
              <h1>{{__('site.formular-rezervari')}}</h1>
              <p>
                {{__('site.text-programare')}}
              </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="mt10">
                    <input type="text" class="form-control" placeholder="{{__('site.nume')}}" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt10">
                    <input type="text" class="form-control" placeholder="{{__('site.prenume')}}" />
                  </div>
                </div>
                <!-- mb5-->
              </div>
              <!-- row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="mt10">
                    <input type="text" class="form-control" placeholder="{{__('site.telefon')}}" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mt10">
                    <input type="text" class="form-control" placeholder="Email" />
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
                      <option value="fatete">{{$serviciu->nume}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mt20">
                    <input type="text" class="form-control" placeholder="{{__('site.data')}}" id="data_programare" />
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                </div>
                <!-- col-md-3 -->
                <div class="col-md-3">
                  <div class="mt20">
                    <input type="text" class="form-control" placeholder="{{__('site.ora')}}" id="ora_programare" />
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!--row-->
              <div class="row">
                <div class="col-md-12">
                  <div class="mt10">
                    <input type="text" placeholder="{{__('site.mesaj')}}" class="form-control" />
                  </div>
                </div>
                <!-- col-md-12 -->
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="mt10">
                    <input type="checkbox" id="acord" class="rounded-checkbox" />
                    <label for="acord" class="d-inline"><a href="/termeni-si-conditii" class="text-white">
                {{__('site.sunt-de-acord-tc')}}
                </a></label>
                  </div>
                </div>
                <!-- col-md-12 -->
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="mt10">
                    <button class="custom-button">
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

  var swiper = new Swiper(".swiper-container", {
    slidesPerView: 1,
    spaceBetween: 30,
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