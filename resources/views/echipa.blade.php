@extends('parts.template')
@section('title', 'Echipa')

@section('content')

<section id="blog-page-image" class="overflow-hidden">
  <div class="grey-overlay">
    <img src="img/woman-patient-PMQSKAN.png" alt="" />

    <div class="overlay-container">
      <h3 class="text-white section-title">{{__('site.echipa')}}</h3>
      <div class="breadcrumb-container">
        <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
        <div class="bara-verticala">|</div>
        <div class="breadcrumb-element">{{__('site.echipa')}}</div>
      </div>
    </div>
  </div>
</section>



<section id="echipa-nav">
  <div class="container">
    <!-- Swiper -->
    <div class="swiper-container s10">
      <div class="swiper-wrapper nav-pills">
           <!-- <div class="swiper-slide">
                  <a class="nav-link active" href="/echipa" onclick="set_active();">
                     Toata echipa
                  </a>
            </div>
            -->
            @if (Request::path() == 'echipa')
              <div class="swiper-slide">
                <a class="nav-link active" href="/echipa}}" onclick="set_active();">{{__('site.toata-echipa')}}</a>
              </div>
              @else
              <div class="swiper-slide">
                <a class="nav-link" href="/echipa" onclick="set_active();">{{__('site.toata-echipa')}}</a>
              </div>
           @endif

            @foreach($clinici as $clinica)
                @if (Request::path() == 'echipa/'.$clinica->slug)
                <div class="swiper-slide">
                  <a class="nav-link active" href="/echipa/{{$clinica->slug}}"
                    onclick="set_active();">{{$clinica->nume}}</a>
                </div>
                @else
                <div class="swiper-slide">
                  <a class="nav-link" href="/echipa/{{$clinica->slug}}" onclick="set_active();">{{$clinica->nume}}</a>
                </div>
                @endif
            @endforeach
      </div>

      <div class="swiper-pagination swiper-pagination10" id="centered_pagination"></div>
    </div>
    <!-- end swiper -->
  </div>
</section>




<section id="echipa" class="mb4 mt4 animated-link">
  <div class="container">
    <div class="row">
      @foreach($echipa as $persoana)
      <div class="col-md-4">
      <div data-aos="zoom-in-down" data-aos-easing="ease-out-cubic"
     data-aos-duration="1000">
        <div class="card">
          <img src="{{Voyager::image($persoana->imagine)}}" alt="" class="echipa-thumb" />
          <h4 class="grey">
            {{$persoana->nume}}
          </h4>
          <p class="grey light-text">
            @if(strlen($persoana->specializare) > 200)
            {{substr($persoana->specializare, 0, 200) . '...'}}
            @else
            {{$persoana->specializare}}
            @endif
          </p>
          <a href="/membru/{{$persoana->slug}}"><span class="linie_link"></span> {{__('site.citeste-mai-multe')}}</a>
        </div>
        </div>
        <!-- end card -->
      </div>
      @endforeach
    </div>
    <!-- row -->
  </div>
  <!-- container -->
</section>

<section id="echipa-testimoniale">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>{{__('site.testimoniale')}}</h1>
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
          <div class="swiper-pagination swiper-pagination11"></div>
        </div>
        <!-- swiper -->
      </div>
      <!-- col-md-8 -->
    </div>
    <div class="col-md-2"></div>
    <!-- row -->
  </div>
</section>
<a id="button_to_top"></a>


@endsection

@push('scripts')
<script>
   AOS.init({
    duration: 1200,
  });
  var swiper = new Swiper(".swiper-container.s2", {
    slidesPerView: 1,
    spaceBetween: 30,
    slidesPerGroup: 1,
    pagination: {
      el: ".swiper-pagination11",
      clickable: true,
    },
  });


  var swiper = new Swiper(".swiper-container.s10", {
    slidesPerView: 4,
    spaceBetween: 15,
    slidesPerGroup: 4,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination10",
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