@extends('parts.template')

@section('title', 'Tarife')

@section('content')
<div id="tarife_page">

  <section id="tarife-page-image" class="overflow-hidden mt-2">
    <div class="grey-overlay">
      <img src="img/6621.png" alt="" />

      <div class="overlay-container">
        <h3 class="text-white section-title">{{__('site.tarife')}}</h3>
        <div class="breadcrumb-container">
          <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
          <div class="bara-verticala">|</div>
          <div class="breadcrumb-element">{{__('site.tarife')}}</div>
        </div>
      </div>
    </div>
  </section>

  <section id="tarife-nav">
    <div class="container">
      <!-- Swiper -->
      <div class="swiper-container">
        <div class="swiper-wrapper nav-pills">
          @if (Request::path() == 'tarife')
          <div class="swiper-slide">
            <a class="nav-link active" href="/tarife}}" onclick="set_active();">{{__('site.toate-tarifele')}}</a>
          </div>
          @else
          <div class="swiper-slide">
            <a class="nav-link" href="/tarife" onclick="set_active();">{{__('site.toate-tarifele')}}</a>
          </div>
          @endif
          @foreach($categorii as $categorie)
          @if (Request::path() == 'tarife/'.$categorie->slug)
          <div class="swiper-slide">
            <a class="nav-link active" href="/tarife/{{$categorie->slug}}"
              onclick="set_active();">{{$categorie->nume}}</a>
          </div>
          @else
          <div class="swiper-slide">
            <a class="nav-link" href="/tarife/{{$categorie->slug}}" onclick="set_active();">{{$categorie->nume}}</a>
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

  <section id="tarife" class="mt4">
    <div class="container">
      @foreach($tarife as $tarif)
      <div class="row grey_background mt-4 align-items-center">
        <div class="col-lg-8 d-flex flex-row align-items-center pl-0 pr-0 tarif_box">
          @if($tarif->reducere == 1)
          <div class="discount exista-discount">
            <p class="discount-nr">{{$tarif->valoare_reducere}}% discount</p>
          </div>
          @else
          <div class="discount ">
            <p class="discount-nr"></p>
          </div>
          @endif
          <div class="ml-3">
            <h4>{{$tarif->titlu}}</h4>
            <p class="grey thin-text mb-0 descriere-serviciu">
              {{$tarif->continut}}
            </p>
          </div>
        </div>
        <!-- <div class="col-lg-4 d-flex flex-row justify-content-end price_tarif_box">
          <div class="d-flex flex-row align-items-center">
            <p class="bold-text medium-blue mb-0">{{$tarif->pret}} lei</p>
            <button class="btn btn-primary"
              onclick="arata_modal('{{$tarif->titlu}}')">{{__('site.buton-programeaza')}}</button>
          </div>
        </div> -->
        <div class="col-lg-2 d-flex flex-row justify-content-center price_tarif_box">
            <p class="bold-text medium-blue mb-0">{{$tarif->pret}} lei</p>
        </div>
        <div class="col-lg-2 d-flex flex-row justify-content-center price_tarif_box">
             <button class="btn btn-primary"
              onclick="arata_modal('{{$tarif->titlu}}')">{{__('site.buton-programeaza')}}</button>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  <a id="button_to_top"></a>

  <div class="modal fade" id="programeaza_tarife" tabindex="-1" aria-labelledby="programeaza_tarife_label"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="programeaza_tarife_label">

          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

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


                <div class="col-md-4">
                  <div class="mt10">
                    <input type="text" class="form-control" placeholder="{{__('site.data')}}" id="data_programare" />
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mt10">
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
                    <label for="acord" ><a href="/termeni-si-conditii" class="light-text grey">
                {{__('site.sunt-de-acord-tc')}}
                </a></label>
                  </div>
                </div>
              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="mt4">
                    <button onclick="trimite_tarif();"
                      class="btn btn-primary">{{__('site.buton-programeaza')}}</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end col-md-12 -->
            <div class="col-md-2"></div>
          </div>
          <!-- end row -->
        </div>
        <!-- end col-md-12 -->
        <div class="col-md-2"></div>
      </div>

    </div>
  </div>
</div>
</div>
<input type="hidden" id="new_v" value="" />
</div>
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
      300: {
        slidesPerView: 2,
        spaceBetween: 10,
        slidesPerGroup: 2,
      },
    },
  });
  $(function () {
    $("#data_programare").datepicker();
    $("#ora_programare").timepicker();
  });
</script>
@endpush