@extends('parts.template')
@section('title',settings('admin.contact_titlu'))
@section('site_description',settings('admin.contact_description'))
@section('keywords',settings('admin.contact_keywords'))

@section('content')

<section id="blog-page-image">
  <div class="grey-overlay">
    <img src="img/3122.png" alt="" />

    <div class="overlay-container">
      <h3 class="text-white section-title">{{__('site.contact')}}</h3>
      <div class="breadcrumb-container">
        <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
        <div class="bara-verticala">|</div>
        <div class="breadcrumb-element">{{__('site.contact')}}</div>
      </div>
    </div>
  </div>
 
</section>



<section id="contact-section" class="mt4 mb4">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="medium-blue mb-2">Clinica stomatologica Unirea</h2>
        <p class="grey">
          Str. Th. Sperantia 14, et 1, SECTOR 3, Bucuresti, REPERE: Zepter,
          B-dul Unirii. Ne gasesti foarte usor: Zona Unirea-Vitan, in
          spatele fostei Poste Vitan. Poti ajunge cu autobuzul 123 de langa
          magazinul Unirea (statia I.C. Bratianu) si cobori dupa 3 s
        </p>
        <h5 class="d-inline grey">PROGRAM:</h5>
        <p class="d-inline grey">
          Luni-Vineri 8-21, Sambata 10-18
        </p>
        <div class="d-flex flex-row flex-wrap pt-3">
          <div class="grey mr-4">
            <h5>
              KPG Giurca Simona:
            </h5>
            <p class="mb-0">Email: simona@neoclinique.ro</p>
            <p>Mobil: +4 0755 101 002</p>
          </div>
          <!-- div class d-flex -->
          <div class="grey">
            <h5>
              KPG Visovan Catalina:
            </h5>
            <p class="mb-0">Email: catalina@neoclinique.ro</p>
            <p>Mobil: +4 0755 101 001</p>
          </div>
          <!-- div class d-flex -->
        </div>
        <!-- div d-flex -->

        <h2 class="medium-blue mt4 mb-2">Clinica stomatologica Militari</h2>
        <p class="grey">
          Str. Rosia Montana 6, SECTOR 6, Bucuresti, REPERE: P-ta Gorjului,
          Politia 21. Ne gasesti foarte usor: Clinica Dentara de pe str.
          Rosia Montana nr 6, unde ajungi de la Metrou Gorjului pe str.
          Cetatea de Balta sau str. Dezrobirii in 5 minute.
        </p>
        <h5 class="d-inline grey">PROGRAM:</h5>
        <p class="d-inline grey">
          Luni-Vineri 8-21, Sambata 10-18
        </p>
        <div class="d-flex flex-row flex-wrap pt-3">
          <div class="grey mr-4">
            <h5>
              KPG Grigore Elena:
            </h5>
            <p class="mb-0">Email: elena@neoclinique.ro</p>
            <p>Mobil: +4 0755 101 003</p>
          </div>
          <!-- div class d-flex -->
          <div class="grey">
            <h5>
              KPG Ionica Vera:
            </h5>
            <p class="mb-0">Email: vera@neoclinique.ro</p>
            <p>Mobil: +4 0755 101 003</p>
          </div>
          <!-- div class d-flex -->
        </div>
        <!-- div d-flex -->
      </div>
      <!-- col-md-6 -->
      <div class="col-md-6">
        <div class="formular-rezervare">
          <div class="formular-rezervare-content text-white p-5">
            <h1>{{__('site.trimite-mesaj')}}</h1>
            <p class="mt4">
              {{__('site.trimite-mesaj-text')}}
            </p>

            <input id="nume" type="text" class="form-control mb8" placeholder="{{__('site.nume')}}" />

            <input id="telefon" type="text" class="form-control mb8" placeholder="{{__('site.telefon')}}" />

            <input id="email" type="text" class="form-control mb8" placeholder="Email" />
            <select  id="medic" class = "form-control mb8" name = "medic">
              <option value="">{{__('site.slelect-medic')}}</option>
              @foreach($echipa as $medic)
                <option value="{{$medic->nume}}">{{$medic->nume}}</option>
              @endforeach
            </select>
            <input type="file" id="radiography" accept="application/pdf" style="display: none !important; width: 0px !important; height: 0px !important">
            <div class = "upload-button form-control mb8" style = "cursor:pointer;">{{__('site.radiography')}}</div>
            <input id="mesaj" type="text" class="form-control mb8" placeholder="{{__('site.mesaj')}}" />
            <div style = "display:flex;flex-direction:column">
              <div>
                <input type="checkbox" id="client" class="rounded-checkbox" />
            <label for="acord">
            <a href="/termeni-si-conditii" class="text-white">
                {{__('site.client')}}
                </a>
              </label>
              </div>
            </div>
            <input type="checkbox" id="acord" class="rounded-checkbox" />
            <label for="acord">
            <a href="/termeni-si-conditii" class="text-white">
                {{__('site.sunt-de-acord-tc')}}
                </a>
              </label>
              

            <button class="custom-button mt8" onclick="trimite_contact();">
              {{__('site.trimite')}}
            </button>
          </div>
          <!-- formular-rezervare-content -->
        </div>
        <!-- formular-rezervare -->
      </div>
    </div>
  </div>
</section>

<section>
  <div id="map"></div>
</section>

<a id="button_to_top"></a>
@endsection

@push('scripts')
<script>
  var locations = [

    @foreach($clinici as $clinica)["{{$clinica->nume}}", parseFloat("{{$clinica->latitudine}}"), parseFloat(
      "{{$clinica->longitudine}}")],
    @endforeach
  ];



  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: new google.maps.LatLng(44.4361274, 26.0697847),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  });

  var infowindow = new google.maps.InfoWindow();

  var marker, i;

  for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      icon: "img/pin.svg",
      map: map,
      animation: google.maps.Animation.DROP,
    });

    google.maps.event.addListener(
      marker,
      "click",
      (function (marker, i) {
        return function () {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        };
      })(marker, i)
    );
  }
</script>
<script>
  $('.upload-button').click(function(){
    $('#radiography').trigger('click');
    $('#radiography').change(function () {
      var nume_fisier = $('#radiography').val();
      nume_fisier_modificat = nume_fisier.split("\\");
      if (nume_fisier) {
          $(".upload-button").text(nume_fisier_modificat[nume_fisier_modificat.length - 1]);
      }
      else {
          $(".upload-button").text("{{__('site.no-choosen')}}");
      }
  });
  });
</script>
@endpush