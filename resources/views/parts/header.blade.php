@php

    $clinici = \App\Clinica::get();
    $clinici = $clinici->translate(\App::getLocale(), 'ro');

@endphp
<div class="page-wrapper">
        <div
          class="top-nav d-flex flex-row justify-content-between align-items-center px-5"
        >
          <div class="toggler-container">
            <button class="hamburger">
              <div class="line"></div>
              <div class="line"></div>
              <div class="line"></div>
            </button>
          </div>
          <a href="/" id="header_logo"><img src="img/logo.svg" alt="" class="img-fluid"/></a>

          <div class="search-container">
            <i class="fa fa-search header-search"></i>
            <input
              class="form-control py-2 search-input search-active"
              type="search"
              id="example-search-input"
            />
            <button value="RO" id="header-language">{{__('site.limba')}}</button>
            <a href="tel:+4 0371 000 111"
              ><img src="img/phone.svg" alt="" class="header-phone"
            /></a>
          </div>
          <!-- toggler-container -->
        </div>
        <!-- top-nav-->
        <div class="side-wrapper">
          <div class="side-content">
            <button class="close-btn">
              <div class="line"></div>
              <div class="line"></div>
            </button>

            <div class="logo mt-5 mb-3">
              <img
                src="img/neoclinique_alb_logo.svg"
                alt=""
                class="img-fluid"
              />
            </div>

            <div class="input-group search-nav">
              <input
                class="form-control py-2 border-left-0 border"
                type="search"
                id="example-search-input2"
              />
              <i class="fa fa-search search-icon"></i>
            </div>
            
            <div class="row mt25">
              <div class="col-6 d-flex flex-column">
                <a href="/">{{__('site.acasa')}}</a>
                <a href="/servicii">{{__('site.servicii')}}</a>
                <!-- <a href="/noutati">{{__('site.noutati')}}</a> -->
                <a href="/oferte">{{__('site.oferte')}}</a>
                <a href="/galerie/video">{{__('site.video')}}</a>
                <a href="/contact">{{__('site.contact')}}</a>
                <a href="/cazuri">{{__('site.cazuri')}}</a>
              </div>
              <!-- col-md-6 -->
              <div class="col-6 d-flex flex-column">
                
                <a href="/infos">{{__('site.info')}}</a>
                <a href="/echipa">{{__('site.echipa')}}</a>
                <a href="/tarife">{{__('site.tarife')}}</a>
                <a href="/galerie/foto">{{__('site.foto')}}</a>
                <a href="/blog">{{__('site.blog')}}</a>
              </div>
              <!-- col-md-6 -->
            </div>
            <!-- row -->
            <div class="horizontal_line"></div>
            <div class="schimba_limba d-flex flex-row">
              <div class="language">
              {{__('site.limba')}}
              </div>
              <div class="dropdown">
                <button
                  class="btn btn-secondary dropdown-toggle change_language light-text"
                  type="button"
                  id="dropdownMenuButton"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                {{__('site.schimba-limba')}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item text-dark" href="/locale/ro">RO</a>
                  <a class="dropdown-item text-dark" href="/locale/en">EN</a>
                </div>
              </div>
            </div>

            <div class="row social-media mt25">
              <div class="col-md-12 d-flex">
                <a href="{{settings('site.instagram')}}"><img src="img/instagram (1).svg" alt="" /></a>
                <a href="{{settings('site.facebook')}}"><img src="img/facebook (2).svg" alt="" /></a>
                <a href="{{settings('site.twitter')}}"><img src="img/twitter (1).svg" alt="" /></a>
                <a href="{{settings('site.linkedin')}}"><img src="img/linkedin.svg" alt="" /></a>
                <a href="{{settings('site.youtube')}}"><img src="img/youtube-logotype.svg" alt="" /></a>
              </div>
            </div>
            <!-- row -->
            @foreach($clinici as $clinica)
            <div class="row mt5 adresa1">
              <div class="col-md-12 justify-content-center">
                <h6 class="font-weight-bold text-white">
                {{__('site.clinica-stomatologica')}} {{$clinica->nume}}
                </h6>
                <p class="no_margin">{{$clinica->reper}}</p>
                <p class="no_margin">{{$clinica->adresa}}</p>
                <p class="no_margin">{{$clinica->reper}}.{{$clinica->telefon}}</p>
              </div>
            </div>
            <!-- row-->
            @endforeach
          </div>
          <!-- side-content -->
        </div>
        <!-- side-wrapper -->

        <!-- <div class="content-wrapper">
        <div class="content"></div>
      </div> -->
      </div>
      <!-- page-wrapper -->