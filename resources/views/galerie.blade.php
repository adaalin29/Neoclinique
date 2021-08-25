@extends('parts.template')
@section('title','Galerie')
@section('site_description','Galerie Description')
@section('keywords','Key1,Key2,Key3')
@section('content')
<section id="blog-page-image" class="overflow-hidden mt-2">
  <div class="grey-overlay">
    <img src="img/woman-dentist-in-the-medical-dental-office-she-is--PU98U2Y.png" alt="" />
    <div class="overlay-container">
      <h3 class="text-white section-title">{{__('site.galerie')}}</h3>
      <div class="breadcrumb-container">
        <a href="/" class="breadcrumb-element">{{__('site.acasa')}}</a>
        <div class="bara-verticala">|</div>
        <div href="/galerie" class="breadcrumb-element">{{__('site.galerie')}}</div>
      </div>
    </div>
  </div>
</section>

<section class="pill-nav">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills justify-content-center" id="galerie_nav">
          <!-- <li class="nav-item">
                <a class="nav-link" href="#">Video</a>
              </li> -->
          @foreach($categorii as $categorie)
          @if (Request::path() == 'galerie/'.$categorie->slug)
          <li class="nav-item">

            <a class="nav-link active" href="{{$categorie->slug}}" onclick="set_active();">{{$categorie->nume}}</a>
          </li>
          @else
          <li class="nav-item">

            <a class="nav-link" href="galerie/{{$categorie->slug}}" onclick="set_active();">{{$categorie->nume}}</a>
          </li>
          @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="gallery" class="mb4">
  <div class="container">
    <div id="image-gallery">
      <div class="row">
        @if($poze->imagini)
        @foreach (json_decode($poze->imagini) as $poza)
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 image">
          <div class="img-wrapper">
            <a href="{{Voyager::image($poza)}}"><img src="{{Voyager::image($poza)}}" class="img-fluid" /></a>
            <div class="img-overlay">
              <!-- <i class="fa fa-search-plus" aria-hidden="true"></i> -->
              <span id="zoom-in"><img src="/img/magnifying-glass.svg" alt=""></span>
            </div>
          </div>
</div>
        @endforeach
        @endif
        <!-- end col -->
      </div>
      <!-- End row -->
    </div>
    <!-- End image gallery -->
  </div>
  <!-- End container -->
</section>

<section id="video-gallery">
  <div class="container">
    <!-- Grid row -->
    <div class="row">
      <?php
      if($poze->video)
      {
        $i = 1;
        $y = 1;

        $link = null;
        foreach(json_decode($poze->video) as $vid)
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
          $img = 'https://img.youtube.com/vi/'. $link .'/default.jpg';
          $link = 'https://www.youtube.com/embed/'.$link;
          ?>
          <!-- Grid column -->
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 image">
            <!--Modal: Name-->
            <div class="modal fade" id="modal<?php echo $i++;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <!--Content-->
                <div class="modal-content">
                  <!--Body-->
                  <div class="modal-body mb-0 p-0">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                      <iframe class="embed-responsive-item" src="<?php echo $link;?>"
                        allowfullscreen></iframe>
                    </div>
                  </div>
                </div><!--/.Content-->
              </div>
            </div>
            <!--Modal: Name-->
            <div class="content">
              <a><img class="img-fluid z-depth-1" src="<?php echo $img;?>" alt="video" data-toggle="modal"
                  data-target="#modal<?php echo $y;?>" />
             
                  <img src="/img/play.svg" alt="" class="video-icon" data-toggle="modal"
                  data-target="#modal<?php echo $y++;?>"/>
                </a>
              <div class="content-details fadeIn-bottom text-white">
                <!-- <h1>
                  Experiente
                </h1> -->
             
              </div>
             
            </div><!-- content details -->
          </div><!-- Grid column -->
          <?php
        }
      }
      ?>
    </div><!-- Grid row -->
  </div>
</section>


<a id="button_to_top"></a>


@endsection

@push("scripts")
<script>
  // Gallery image hover
  $(".img-wrapper").hover(
    function () {
      $(this).find(".img-overlay").animate({
        opacity: 1
      }, 600);
    },
    function () {
      $(this).find(".img-overlay").animate({
        opacity: 0
      }, 600);
    }
  );

  // Lightbox
  var $overlay = $('<div id="overlay"></div>');
  var $image = $("<img>");
  var $prevButton = $(
    '<div id="prevButton"><i class="fa fa-angle-left" aria-hidden="true"></i></div>'
  );
  var $nextButton = $(
    '<div id="nextButton"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
  );
  var $exitButton = $(
    '<div id="exitButton">  <button type="button" class="close" data-dismiss="modal" aria-label="Close">  <span aria-hidden="true">&times;</span></button></div>'
  );

  // Add overlay
  $overlay
    .append($image)
    .prepend($prevButton)
    .append($nextButton)
    .append($exitButton);
  $("#gallery").append($overlay);

  // Hide overlay on default
  $overlay.hide();

  // When an image is clicked
  $(".img-overlay").click(function (event) {
    // Prevents default behavior
    event.preventDefault();
    // Adds href attribute to variable
    var imageLocation = $(this).prev().attr("href");
    // Add the image src to $image
    $image.attr("src", imageLocation);
    // Fade in the overlay
    $overlay.fadeIn("slow");
  });

  // When the overlay is clicked
  $overlay.click(function () {
    // Fade out the overlay
    $(this).fadeOut("slow");
  });

  // When next button is clicked
  $nextButton.click(function (event) {
    // Hide the current image
    $("#overlay img").hide();
    // Overlay image location
    var $currentImgSrc = $("#overlay img").attr("src");
    // Image with matching location of the overlay image
    var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
    // Finds the next image
    var $nextImg = $($currentImg.closest(".image").next().find("img"));
    // All of the images in the gallery
    var $images = $("#image-gallery img");
    // If there is a next image
    if ($nextImg.length > 0) {
      // Fade in the next image
      $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
    } else {
      // Otherwise fade in the first image
      $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
    }
    // Prevents overlay from being hidden
    event.stopPropagation();
  });

  // When previous button is clicked
  $prevButton.click(function (event) {
    // Hide the current image
    $("#overlay img").hide();
    // Overlay image location
    var $currentImgSrc = $("#overlay img").attr("src");
    // Image with matching location of the overlay image
    var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
    // Finds the next image
    var $nextImg = $($currentImg.closest(".image").prev().find("img"));
    // Fade in the next image
    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
    // Prevents overlay from being hidden
    event.stopPropagation();
  });

  // When the exit button is clicked
  $exitButton.click(function () {
    // Fade out the overlay
    $("#overlay").fadeOut("slow");
  });
</script>
@endpush