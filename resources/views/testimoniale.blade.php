@extends('parts.template')

@section('title', 'Testimoniale')

@section('content')
<section id="testimoniale-image" class="overflow-hidden">
  <div class="grey-overlay">
    <img src="img/6621.png" alt="" />
    <div class="overlay-container">
      <h3 class="text-white section-title">Testimoniale</h3>
      <div class="breadcrumb-container">
        <a href="/" class="breadcrumb-element">Acasa</a>
        <div class="bara-verticala">|</div>
        <div class="breadcrumb-element">Testimoniale</div>
      </div>
    </div>
  </div>
</section>
<section id="testimoniale-page" class="mt5 mb10">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="mt5">Testimoniale</h1>
        <!-- Swiper -->
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <h4 class="testimonial_opinie mt5">Foarte multumit!</h4>
              <p class="testimonial_descriere mt5 thin-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit
              </p>
              <div class="testimonial_persoana d-flex flex-row">
                <img src="img/70.png" alt="" class="rounded-circle mt5" width="62" height="62" />
                <p class="regular-text grey">Popescu Ionel</p>
              </div>
            </div>
            <div class="swiper-slide">
              <h4 class="testimonial_opinie mt5">Foarte multumit!</h4>
              <p class="testimonial_descriere mt5 thin-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit
              </p>
              <div class="testimonial_persoana d-flex flex-row">
                <img src="img/70.png" alt="" class="rounded-circle mt5" width="62" height="62" />
                <p class="regular-text grey">Popescu Ionel</p>
              </div>
            </div>
            <div class="swiper-slide">
              <h4 class="testimonial_opinie mt5">Foarte multumit!</h4>
              <p class="testimonial_descriere mt5 thin-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit
              </p>
              <div class="testimonial_persoana d-flex flex-row">
                <img src="img/70.png" alt="" class="rounded-circle mt5" width="62" height="62" />
                <p class="regular-text grey">Popescu Ionel</p>
              </div>
            </div>
            <div class="swiper-slide">
              <h4 class="testimonial_opinie mt5">Foarte multumit!</h4>
              <p class="testimonial_descriere mt5 thin-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit
              </p>
              <div class="testimonial_persoana d-flex flex-row">
                <img src="img/70.png" alt="" class="rounded-circle mt5" width="62" height="62" />
                <p class="regular-text grey">Popescu Ionel</p>
              </div>
            </div>
            <div class="swiper-slide">
              <h4 class="testimonial_opinie mt5">Foarte multumit!</h4>
              <p class="testimonial_descriere mt5 thin-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit
              </p>
              <div class="testimonial_persoana d-flex flex-row">
                <img src="img/70.png" alt="" class="rounded-circle mt5" width="62" height="62" />
                <p class="regular-text grey">Popescu Ionel</p>
              </div>
            </div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
        <!-- swiper -->
      </div>
      <!-- col-6 -->
      <div class="col-md-6">
        <div class="formular-rezervare">
          <div class="formular-rezervare-content text-white p-5">
            <h1>Adauga o parere</h1>
            <p class="mt4">
              Lasa-ne parerea ta despre serviciile noastre.
            </p>

            <input type="text" class="form-control mb8" placeholder="Nume" />

            <input type="text" class="form-control mb8" placeholder="Telefon" />

            <input type="text" class="form-control mb8" placeholder="Email" />
            <input type="text" class="form-control mb8" placeholder="Mesaj" />
            <input type="checkbox" id="acord" class="rounded-checkbox" />
            <label for="acord">Sunt de acord cu termenii si conditiile Neoclinique.</label>

            <button class="custom-button mt8">
              Trimite
            </button>
          </div>
          <!-- formular-rezervare-content -->
        </div>
        <!-- formular-rezervare -->
      </div>
      <!-- col-6-->
    </div>
    <!-- row -->
  </div>
  <!-- container-->
</section>

@endsection

@push('scripts')

@endpush