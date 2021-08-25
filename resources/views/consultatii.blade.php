@extends('parts.template')

@section('title', 'Consultatii online')

@section('content')
<div id="consultatii_online_page">
  <section id="consultatii-online-image" class="overflow-hidden">
    <div class="grey-overlay">
      <img src="img/6621.png" alt="" />

      <div class="overlay-container">
        <h3 class="text-white section-title">{{__('site.consultati-online')}}</h3>
        <div class="breadcrumb-container">
          <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
          <div class="bara-verticala">|</div>
          <div class="breadcrumb-element">{{__('site.consultati-online')}}</div>
        </div>
      </div>
    </div>
  </section>

  <section id="formular-consultatii" class="mt4 mb4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>{{__('site.consultatii-online-solutii')}}</h1>
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6 text-center">
          <p class="grey thin-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
        <div class="col-md-3"></div>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="row grey">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="{{__('site.nume')}}" />
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="{{__('site.prenume')}}" />
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="{{__('site.telefon')}}" />
            </div>
          </div>
          <!-- row -->
          <div class="row mt4 grey">
            <div class="col-md-4">
              <input type="text" class="form-control" placeholder="Email" />
            </div>
            <div class="col-md-6">
              <p class="no_margin">
                {{__('site.adauga-fisier')}}
              </p>
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-outline-primary upload">
                {{__('site.incarca')}}
                <i class="fa fa-upload" aria-hidden="true"></i>
              </button>
            </div>
            <!-- col-md-4 -->
          </div>
          <!-- row -->
          <div class="row mt4">
            <div class="col-md-12">
              <input type="text" class="form-control" placeholder="{{__('site.detaliaza-problema')}}" />
            </div>
            <!-- col-md-12 -->
          </div>
          <!-- row -->
          <div class="row grey mt4">
            <div class="col-md-12">
              <div class="d-flex flex-row justify-content-between mt-4">
                <div class="form-check form-check-inline">
                  <input class="form-check-input rounded-checkbox" type="radio" name="inlineRadioOptions"
                    id="inlineRadio1" value="option1" />
                  <label class="form-check-label" for="inlineRadio1">{{__('site.oferta-in-rate')}}</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input rounded-checkbox" type="radio" name="inlineRadioOptions"
                    id="inlineRadio2" value="option2" />
                  <label class="form-check-label" for="inlineRadio2">{{__('site.oferta-credit')}}</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input rounded-checkbox" type="radio" name="inlineRadioOptions"
                    id="inlineRadio3" value="option3" />
                  <label class="form-check-label" for="inlineRadio3">{{__('site.plata-normal')}}</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mt8 text-center">
                <input type="checkbox" id="checkbox_footer" class="rounded-checkbox d-inline-block" />
                <label for="checkbox_footer" class="light-text d-inline grey">{{__('site.sunt-de-acord-tc')}}</label>
              </div>
              <!-- mt8 -->
            </div>
            <!-- col-md-12 -->
          </div>
          <!-- row -->
          <div class="row">
            <div class="col-md-12">
              <div class="mt8">
                <button class="btn btn-primary">
                  {{__('site.buton-programeaza')}}
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- col-md-8  -->
        <div class="col-md-2"></div>
      </div>
      <!-- row -->
    </div>
  </section>
</div>
@endsection

@push('scripts')

@endpush