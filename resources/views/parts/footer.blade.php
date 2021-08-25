<div id="mobile-footer-logo"></div>
      <div id="mobile-footer-form"></div>
      <div class="container py-5">
        <div class="row">
          <!-- <div
            class="col-md-4 d-flex flex-row align-items-center"
            id="mobile-footer-phone"
          ></div> -->
          <div
            class="col-xl-4 col-lg-4 col-md-12 d-flex flex-row align-items-center justify-content-center"
            id="mobile-email"
          >
            <img
              src="img/mail.svg"
              alt=""
              class="img-fluid"
              id="mail-desktop"
            />
            <img src="img/mail-mobile.svg" alt="" id="mail-mobile" />
            <div class="d-block ml-4">
              <h5>{{__('site.email-programari')}}:</h5>
              <p>{{settings('site.email')}}</p>
            </div>
          </div>
          <!-- col -->

          <div
            class="col-xl-4 col-lg-4 col-md-12 d-flex flex-row align-items-center justify-content-center"
          >
            <img
              src="img/Group 2513.svg"
              alt=""
              class="img-fluid"
              id="adresa-desktop"
            />
            <img
              src="img/adresa-mobile.svg"
              alt=""
              class="img-fluid"
              id="adresa-mobile"
            />
            <div class="d-block ml-4">
              <h5>{{__('site.clinici')}}</h5>
              <p>
                Str. Th. Sperantia 14, et 1, SECTOR 3, Bucuresti Clinica
                Militari
              </p>
              <p>Str. Rosia Montana 6, SECTOR 6, Bucuresti</p>
            </div>
          </div>

          <!-- col -->

          <div
            class="col-xl-4 col-lg-4 col-md-12 d-flex flex-row align-items-center justify-content-center"
            id="desktop-footer-phone"
          >
            <img
              src="img/telefon-mobile.svg"
              alt=""
              class="img-fluid"
              id="telefon-mobile"
            />
            <img
              src="img/Group 2514.svg"
              alt=""
              class="img-fluid"
              id="telefon-desktop"
            />
            <div class="d-block ml-4">
              <h5>{{__('site.telefon-programari')}}:</h5>
              <p>
              {{settings('site.telefon')}}
              </p>
            </div>
          </div>

          <!-- col -->
        </div>
        <!-- row -->

        <div class="row pt50">
          <!-- col-md-4-->
          <div
            class="col-md-4 d-flex flex-column justify-content-center"
            id="footer-menu"
          >
          <!-- 
            <p><a href="/">{{__('site.acasa')}}</a></p>
            <p><a href="/servicii">{{__('site.servicii')}}</a></p>
            <p><a href="/noutati">{{__('site.noutati')}}</a></p>
            <p><a href="/oferte">{{__('site.oferte')}}</a></p>
            <p><a href="/galerie/video">{{__('site.video')}}</a></p>
            <p><a href="/contact">{{__('site.contact')}}</a></p>
            <p><a href="/cazuri">{{__('site.cazuri')}}</a></p>
            <p><a href="/info">{{__('site.info')}}</a></p>
            <p><a href="/echipa">{{__('site.echipa')}}</a></p>
            <p><a href="/tarife">{{__('site.tarife')}}</a></p>
            <p><a href="/galerie/foto">{{__('site.foto')}}</a></p>
            <p><a href="/blog">{{__('site.blog')}}</a></p>
             -->
            <h5>{{__('site.informatii-utile')}}</h5>
            <div class="d-flex">
              <div class="d-flex flex-column mr25">
                <a href="/echipa">{{__('site.echipa')}}</a>
                <!-- <a href="#">Cum va putem ajuta</a> -->
                <a href="/noutati">{{__('site.noutati')}}</a>
                <a href="/tarife">{{__('site.tarife')}}</a>
                <a href="/galerie/foto">Media</a>
                <a href="#">ANPC</a>
              </div>
              <div class="d-flex flex-column">
                <a href="/cazuri">{{__('site.cazuri')}}</a>
                <a href="/blog">{{__('site.blog')}}</a>
                <a href="/contact">{{__('site.contact')}}</a>
               
                <a href="/termeni-si-conditii">{{__('site.termeni-si-conditii')}}</a>
              </div>
            </div>
            <div class="d-flex social-media pt-3">
              <a href="{{settings('site.instagram')}}"><img src="img/instagram (1).svg" alt="" /></a>
              <a href="{{settings('site.facebook')}}"><img src="img/facebook (2).svg" alt="" /></a>
              <a href="{{settings('site.twitter')}}"><img src="img/twitter (1).svg" alt="" /></a>
              <a href="{{settings('site.linkedin')}}"><img src="img/linkedin.svg" alt="" /></a>
              <a href="{{settings('site.youtube')}}"><img src="img/youtube-logotype.svg" alt="" /></a>
            </div>
          </div>
          <div
            id="desktop-footer-logo"
            class="col-xl-4 col-lg-4 col-md-12 d-flex justify-content-center p80"
          >
            <img src="img/neoclinique_alb_logo.svg" alt="" class="img-fluid" />
          </div>
          <!-- col-md-4-->
          <div
            class="col-xl-4 col-lg-4 col-md-12 d-flex flex-column justify-content-center p40 pr-0"
            id="desktop-footer-form"
          >
            <h3 class="mb-3">{{__('site.inscrie-news')}}</h3>
            <input type="text" class="form-control" placeholder="{{__('site.nume')}}" id="nume_newsletter" />
            <input type="text" class="form-control" placeholder="Email" id="email_newsletter" />
            <div class="pt-2">
              <input
                type="checkbox"
                id="checkbox_footer"
                class="rounded-checkbox d-inline-block"
              />
              <label for="checkbox_footer" class="light-text d-inline"
                >
                <a href="/termeni-si-conditii">
                {{__('site.sunt-de-acord-tc')}}
                </a>
                </label
              >
            </div>

            <button class="btn btn-primary btn-trimite-footer mt-4" onclick="register_newsletter();">
            {{__('site.trimite')}}
              <i
                class="fa fa-paper-plane-o icon-paper-plane"
                aria-hidden="true"
              ></i>
            </button>
          </div>
          <!-- col-md-4-->
        </div>
        <!-- row -->
        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <p class="no_margin">
              Neoclinique este operator de date cu caracter personal inregistrat
              la A.N.S.P.D.C.P. cu nr. 27725 si 27724 in Registrul de Evidenta
              P.D.C.P.
            </p>
            <p>
              Copyright 2017 Neoclinique. All rights reserved. Developed by
              Touch Media
            </p>
          </div>
        </div>
      </div>