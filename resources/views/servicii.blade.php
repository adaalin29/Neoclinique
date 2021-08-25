@extends('parts.template')
@section('title',settings('admin.servicii_title'))
@section('site_description',settings('admin.servicii_description'))
@section('keywords',settings('admin.servicii_keywords'))
@section('content')
<div id="servicii_page">
  <section id="servicii-page-image" class="overflow-hidden mt-2">
    <div class="grey-overlay">
      <img src="img/460.png" alt="" class="img-fluid" />
      <div class="overlay-container">
        <h3 class="text-white section-title">{{__('site.servicii')}}</h3>
        <div class="breadcrumb-container">
          <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
          <div class="bara-verticala">|</div>
          <div class="breadcrumb-element">{{__('site.servicii')}}</div>
        </div>
      </div>
    </div>
  </section>

  <section id="servicii-section">
    <div class="container animated-link mb4">

      <?php
      $i = 0;
    foreach($servicii as $serviciu){
      if($i == 3){
        ?>
      <div class="row mt4 ">
        <div class="col-md-12 no_padding">
          <div class="container_image">
            <div class="content">
              <div class="content-overlay"></div>
              <img class="content-image" src="{{Voyager::image($card->imagine)}}" />
              <div class="content-details fadeIn-top text-white">
                <h2>
                  {{$card->titlu}}
                </h2>
                <p class="grey">
                  {{$card->continut}}
                </p>
                <button onclick="location.href = '{{$card->link}}'"
                  class="btn btn-primary custom-button medium-blue mt-4">
                  {{__('site.vezi-tarifele')}}
                </button>
              </div>
              <!-- content details -->
            </div>
            <!-- content -->
          </div>
          <!-- container-image -->
        </div>
      </div>
      <?php
            }
      if($i % 2 == 0){
      $decoded_photos = json_decode($serviciu['imagini'],true);
        ?>
      <div class="row grey_background mt4">
        <div class="col-md-5 no_padding">
          <div class="code code--small code--left h-100" data-aos="zoom-in-up" data-aos-delay="250">
            <?php
            if($decoded_photos && count($decoded_photos) > 0)
        {
            ?>
            <img class="image_cover" src="{{Voyager::image($decoded_photos[0])}}" />
            <?php
        }
        ?>
          </div>
        </div>
        <div class="col-md-7">
          <div class="p80 descriere_serviciu">
            <div class="d-flex flex-row justify-content-center align-items-center">
              <img src="{{Voyager::image($serviciu->icon)}}" alt="" class="icon" />
              <h2>{{$serviciu->nume}}</h2>
            </div>
            <p class="grey">
              @if(strlen($serviciu->descriere) > 200)
              {{substr($serviciu->descriere, 0, 350) . '...'}}
              @else
              {{$serviciu->descriere}}
              @endif
            </p>
            <a href="/servicii/{{$serviciu->slug}}">
              <p><span class="linie_link"></span> {{__('site.citeste-mai-multe')}}</p>
            </a>
          </div>
        </div>
        <!-- col-md-7 -->
      </div>
      <?php
    }
    else{
      $decoded_photos = json_decode($serviciu['imagini'],true);
      ?>
      <div class="row grey_background mt4">
        <div class="col-md-7" id="after-img1">
          <div class="p80 descriere_serviciu">
            <div class="d-flex flex-row justify-content-center align-items-center">
              <img src="{{Voyager::image($serviciu->icon)}}" alt="" class="icon" />
              <h2>{{$serviciu->nume}}</h2>
            </div>
            <p class="grey">
              @if(strlen($serviciu->descriere) > 200)
              {{substr($serviciu->descriere, 0, 350) . '...'}}
              @else
              {{$serviciu->descriere}}
              @endif
            </p>
            <a href="/servicii/{{$serviciu->slug}}">
              <p><span class="linie_link"></span> {{__('site.citeste-mai-multe')}}</p>
            </a>
          </div>
        </div>
        <div class="col-md-5 no_padding" id="img1">
          <div class="code code--small code--left h-100" data-aos="zoom-in-up" data-aos-delay="250">
            <?php
            if($decoded_photos && count($decoded_photos) > 0)
        {
            ?>
            <img class="image_cover" src="{{Voyager::image($decoded_photos[0])}}" />
            <?php
        }
        ?>
          </div>
        </div>
        <!-- col-md-7 -->
      </div>
      <?php
    }
    $i++;
    }
?>
      <!-- container -->
  </section>

  <a id="button_to_top"></a>
</div>
@endsection

@push('scripts')
<script>
  AOS.init({
    duration: 1200,
  });
</script>
@endpush