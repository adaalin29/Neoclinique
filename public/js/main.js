// JUST VANILLA JS

const side_wrapper = document.querySelector(".side-wrapper");
const side_content = document.querySelector(".side-content");
const open_btn = document.querySelector(".hamburger");
const close_btn = document.querySelector(".close-btn");

open_btn.addEventListener("click", openMenu);
close_btn.addEventListener("click", closeMenu);
window.addEventListener("click", outsideClick);

function openMenu() {
  side_wrapper.classList.add("opened");
  side_content.classList.add("slideIn");
  document.querySelector("body").style.overflow = "hidden";
}

function closeMenu() {
  side_wrapper.classList.remove("opened");
  side_content.classList.remove("slideIn");
  document.querySelector("body").style.overflow = "auto";
}

function outsideClick(e) {
  if (e.target === side_wrapper) {
    closeMenu();
  }
}

$(document).ready(function () {
  if (screen.width <= 992) {
    $("#desktop-footer-logo").appendTo("#mobile-footer-logo");
    $("#desktop-footer-form").appendTo("#mobile-footer-form");
    $("#desktop-footer-phone").removeClass("justify-content-end");
    $("#desktop-footer-phone").addClass("justify-content-center");
    $("#desktop-footer-phone").appendTo("#mobile-footer-phone");
    $("#desktop-footer-phone").insertBefore("#mobile-email");
  }
  if (screen.width < 992) {
    $(".formular-rezervare").addClass("mt10");
    $("#tarif_box").css("flex-direction", "column!important");
    $(".price_tarif_box").removeClass("justify-content-end");
    $(".price_tarif_box").addClass("justify-content-center");
  }
  if (screen.width < 768) {
    $("#img1").insertBefore("#after-img1");
    $("#img2").insertBefore("#after-img2");
    $("#img3").insertBefore("#after-img3");
    $("#img4").insertBefore("#after-img4");

    $("#echipa_nav").css("flex-direction", "column");
    $("#galerie_nav").css("flex-direction", "column");
    $("#video_nav").css("flex-direction", "column");
  }
  if (screen.width < 540) {
    $(".logo").removeClass("mt-5");
    $(".logo").addClass("mt-2");
  }
  if (screen.width < 420) {
    $("#info_utile_homepage .swiper-slide").css("justify-content", "center");
  }

  $("#example-search-input").keyup(function (e) {
    var code = e.key;
    if (code === "Enter") e.preventDefault();
    if (code === "Enter" || code === "," || code === ";") {
      location.href = "/search/" + $("#example-search-input").val();
    }
  });
  $("#example-search-input2").keyup(function (e) {
    var code = e.key;
    if (code === "Enter") e.preventDefault();
    if (code === " " || code === "Enter" || code === "," || code === ";") {
      location.href = "/search/" + $("#example-search-input2").val();
    }
  });
});
jQuery(window).on("load", function () {
  $(".container-articles").masonry({
    columnWidth: ".grid-sizer",
    gutter: 15,
    itemSelector: ".item",
    percentPosition: "true",
    // fitWidth: false,
  });
});
function set_active() {
  $(".nav-link").removeClass("active");
  $target = $(event.target);
  $target.addClass("active");
}

$(".header-search").click(function () {
  if ($(".search-input").hasClass("search-active")) {
    if (screen.width > 1366) {
      $(".search-input").css("width", "250px");
      $(".search-input").css("padding", "20px");
      $(".search-input").css("border", "1px solid #919191");
      $(".search-input").css("border-radius", "20px");
      $(".search-input").removeClass("search-active");
    } else {
      $(".search-input").css("width", "250px");
      $(".search-input").css("padding", "20px");
      $(".search-input").css("border", "1px solid #919191");
      $(".search-input").css("border-radius", "20px");
      $(".search-input").removeClass("search-active");
    }
  } else {
    $(".search-input").addClass("search-active");
    $(".search-input").css("width", "0px");
    $(".search-input").css("padding", "0px");
    $(".search-input").css("border", "0px");
  }
});

var btn = $("#button_to_top");

$(window).scroll(function () {
  if ($(window).scrollTop() > 900) {
    btn.addClass("show");
  } else {
    btn.removeClass("show");
  }
});

btn.on("click", function (e) {
  e.preventDefault();
  $("html, body").animate({ scrollTop: 0 }, "900");
});

// trimite form
function trimite_formular() {
  var $nume = $("#nume");
  var $prenume = $("#prenume");
  var $telefon = $("#telefon");
  var $email = $("#email");
  var $interesat = $("#interesat_de");
  var $data_i = $("#data_programare");
  var $ora = $("#ora_programare");
  var $mesaj = $("#mesaj");
  var $persoana = $("#persoana");

  if ($("#acord").prop("checked") == true) {
    $.ajax({
      url: "/trimite_rezervare",
      type: "POST",
      data: {
        nume: $nume.val(),
        prenume: $prenume.val(),
        telefon: $telefon.val(),
        email: $email.val(),
        interesat: $interesat.val(),
        data_i: $data_i.val(),
        ora: $ora.val(),
        mesaj: $mesaj.val(),
        persoana:$persoana.val(),
      },
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (resp) {
        if (resp.code == 200) {
          $("#acord").prop("checked", false);
          $nume.val("");
          $prenume.val("");
          $telefon.val("");
          $email.val("");
          $interesat.val("");
          $data_i.val("");
          $ora.val("");
          $mesaj.val("");
          alertify.success(resp.msg);
          //console.log(resp.msg);
        }
        if (resp.code == "300") {
          var messages = resp.msg;
          console.log(messages);
          $.each(messages, function (key, value) {
            //console.log();
            alertify.error(messages[key][0]);
          });
        }
      },
      error: function (p1, p2) {
        alertify.error(p1.responseJSON.message);
        //console.log(p1.responseJSON.message);
      },
    });
  } else {
    alertify.error(
      "Trebuie sa fii de acord cu termenii si conditiile site-ului!"
    );
  }
}

function trimite_tarif() {
  var $nume = $("#nume");
  var $prenume = $("#prenume");
  var $telefon = $("#telefon");
  var $email = $("#email");
  var $data_i = $("#data_programare");
  var $ora = $("#ora_programare");
  var $mesaj = $("#mesaj");
  var $tarif = $("#new_v");

  if ($("#acord").prop("checked") == true) {
    $.ajax({
      url: "/trimite_tarif",
      type: "POST",
      data: {
        nume: $nume.val(),
        prenume: $prenume.val(),
        telefon: $telefon.val(),
        email: $email.val(),
        data_i: $data_i.val(),
        ora: $ora.val(),
        mesaj: $mesaj.val(),
        tarif:$tarif.val(),
      },
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (resp) {
        if (resp.code == 200) {
          $("#acord").prop("checked", false);
          $nume.val("");
          $prenume.val("");
          $telefon.val("");
          $email.val("");
          $data_i.val("");
          $ora.val("");
          $mesaj.val("");
          alertify.success(resp.msg);
          //console.log(resp.msg);
        }
        if (resp.code == "300") {
          var messages = resp.msg;
          console.log(messages);
          $.each(messages, function (key, value) {
            //console.log();
            alertify.error(messages[key][0]);
          });
        }
      },
      error: function (p1, p2) {
        alertify.error(p1.responseJSON.message);
        //console.log(p1.responseJSON.message);
      },
    });
  } else {
    alertify.error(
      "Trebuie sa fii de acord cu termenii si conditiile site-ului!"
    );
  }
}

// inregistrare newsletter
function register_newsletter() {
  var $nume_newsletter = $("#nume_newsletter");
  var $email_newsletter = $("#email_newsletter");

  if ($("#checkbox_footer").prop("checked") == true) {
    $.ajax({
      url: "/inregistrare_newsletter",
      type: "POST",
      data: {
        nume_newsletter: $nume_newsletter.val(),
        email_newsletter: $email_newsletter.val(),
      },
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (resp) {
        if (resp.code == 200) {
          $nume_newsletter.val("");
          $email_newsletter.val("");
          alertify.success(resp.msg);
          //console.log(resp.msg);
        }
        if (resp.code == "300") {
          var messages = resp.msg;
          // console.log(messages);
          $.each(messages, function (key, value) {
            //console.log();
            alertify.error(messages[key][0]);
          });
        }
        if (resp.code == "400") {
          alertify.error(resp.msg);
        }
      },
      error: function (p1, p2) {
        alertify.error(p1.responseJSON.message);
        //console.log(p1.responseJSON.message);
      },
    });
  } else {
    alertify.error(
      "Trebuie sa fii de acord cu termenii si conditiile site-ului!"
    );
  }
}

// trimite mail contact
function trimite_contact() {
  var $nume = $("#nume");
  var $telefon = $("#telefon");
  var $mesaj = $("#mesaj");
  var $email = $("#email");
  var $medic = $("#medic");
  var $client = $("#client");
  var $radiography = $("#radiography");

  if ($("#acord").prop("checked") == true) {
    $.ajax({
      url: "/trimite_contact",
      type: "POST",
      data: {
        nume: $nume.val(),
        telefon: $telefon.val(),
        mesaj: $mesaj.val(),
        email: $email.val(),
        medic: $medic.val(),
        client:$client.val(),
        radiography:$radiography.val(),
      },
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (resp) {
        if (resp.code == 200) {
          $nume.val("");
          $telefon.val("");
          $mesaj.val("");
          $email.val("");

          alertify.success(resp.msg);
          //console.log(resp.msg);
        }
        if (resp.code == "300") {
          var messages = resp.msg;
          // console.log(messages);
          $.each(messages, function (key, value) {
            //console.log();
            alertify.error(messages[key][0]);
          });
        }
      },
      error: function (p1, p2) {
        alertify.error(p1.responseJSON.message);
        //console.log(p1.responseJSON.message);
      },
    });
  } else {
    alertify.error(
      "Trebuie sa fii de acord cu termenii si conditiile site-ului!"
    );
  }
}

function arata_modal(nume_tarif) {
  var $modal = $("#programeaza_tarife");
  $("#new_v").val(nume_tarif);
  $("#programeaza_tarife_label").text(nume_tarif);
  $modal.modal("show");
}

function adauga_din_tarif() {
  var $nume = $("#nume");
  var $prenume = $("#prenume");
  var $telefon = $("#telefon");
  var $email = $("#email");
  var $interesat = $("#new_v");
  var $data_i = $("#data_programare");
  var $ora = $("#ora_programare");
  var $mesaj = $("#mesaj");

  if ($("#acord").prop("checked") == true) {
    $.ajax({
      url: "/trimite_rezervare",
      type: "POST",
      data: {
        nume: $nume.val(),
        prenume: $prenume.val(),
        telefon: $telefon.val(),
        email: $email.val(),
        interesat: $interesat.val(),
        data_i: $data_i.val(),
        ora: $ora.val(),
        mesaj: $mesaj.val(),
      },
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (resp) {
        if (resp.code == 200) {
          $nume.val("");
          $prenume.val("");
          $telefon.val("");
          $email.val("");
          $interesat.val("");
          $data_i.val("");
          $ora.val("");
          $mesaj.val("");
          alertify.success(resp.msg);
          //console.log(resp.msg);
        }
        if (resp.code == "300") {
          var messages = resp.msg;
          console.log(messages);
          $.each(messages, function (key, value) {
            //console.log();
            alertify.error(messages[key][0]);
          });
        }
      },
      error: function (p1, p2) {
        alertify.error(p1.responseJSON.message);
        //console.log(p1.responseJSON.message);
      },
    });
  } else {
    alertify.error(
      "Trebuie sa fii de acord cu termenii si conditiile site-ului!"
    );
  }
}

function redirect_tarif(link) {
  location.href = "/tarife/" + link;
}

// header sticky
$(window).scroll(function () {
  if ($(this).scrollTop() > 1) {
    $(".top-nav").addClass("sticky");
  } else {
    $(".top-nav").removeClass("sticky");
  }
});
