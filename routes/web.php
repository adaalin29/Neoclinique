<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "HomeController@index");
Route::post('/trimite_rezervare','HomeController@trimite_rezervare'); // trimite rezervare;
Route::post('/trimite_tarif','HomeController@trimite_tarif'); // trimite rezervare;
Route::post('inregistrare_newsletter','HomeController@inregistrare_newsletter');// Inregistrare Newsletter

Route::get('/search/{slug}','HomeController@search'); // cautare

Route::get('/echipa', "EchipaController@index");

Route::get('/membru/{slug}', "EchipaController@persoana_detaliu");

Route::get('/servicii', "ServiciiController@index");

Route::get('/servicii/{slug}', "ServiciiController@serviciu");

Route::get('/blog', "BlogController@index");

Route::get('/blog/{slug}', "BlogController@blog");

Route::get('/articol/{slug}', "BlogController@articol"); 

Route::get('/contact', "ContactController@index");
Route::post('/trimite_contact', "ContactController@trimite_contact"); // trimite email contact


Route::get('/termeni-si-conditii', "TermeniController@index");

Route::get('/consultatii-online', "ConsultatiiController@index");

Route::post('/consultatii-online', "ConsultatiiController@consult");

Route::get('/testimoniale', "TestimonialController@index");

Route::post('/testimoniale', "TestimonialController@testimonial");

Route::get('/cazuri', "CazController@index");

Route::get('/cazuri/{slug}', "CazController@categorii");

Route::get('/caz/{slug}', "CazController@caz");

Route::get('/galerie/{slug}', "GalerieController@index");

Route::post('/galerie/arata','GalerieController@arata_poze');

Route::get('/tarife', "TarifeController@index");

Route::get('/tarife/{slug}', "TarifeController@tarife");

Route::get('/oferte', "OfertaController@index");

Route::get('/oferte/{slug}', "OfertaController@oferta");

Route::get('/infos', "InfoController@index");

Route::get('/infos/{slug}', "InfoController@infos");

Route::get('/info/{slug}', "InfoController@informatie");

Route::get('/noutati', "NoutatiController@index");

Route::get('/noutati/{slug}', "NoutatiController@noutate");

Route::get('/testimoniale', "TestimonialeController@index");

Route::get('/consultatii', "ConsultatiiController@index");

Route::get('/echipa/{slug}', "EchipaController@clinica");

Route::get('locale/{locale}', function($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
  });
// Redirects

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/{lang}', function ($lang) {
    if($lang == 'en' or $lang == 'ro'){
        return redirect('/', 301)->with('lang', $lang);
    }
    else{
        return abort(404);
    }
});

Route::get('/{lang}/servicii', function ($lang) {
    if($lang == 'en' or $lang == 'ro'){
        return redirect('/servicii', 301)->with('lang', $lang);
    }
    else{
        return abort(404);
    }
});

Route::get('/{lang}/info', function ($lang) {
    if($lang == 'en' or $lang == 'ro'){
        return redirect('/infos', 301)->with('lang', $lang);
    }
    else{
        return abort(404);
    }
});

Route::get('/info', function () {
        return redirect('/infos', 301);
});

Route::get('/{lang}/cazuri', function ($lang) {
    if($lang == 'en' or $lang == 'ro'){
        return redirect('/cazuri', 301)->with('lang', $lang);
    }
    else{
        return abort(404);
    }
});

Route::get('/{lang}/echipa', function ($lang) {
    if($lang == 'en' or $lang == 'ro'){
        return redirect('/echipa', 301)->with('lang', $lang);
    }
    else{
        return abort(404);
    }
});

Route::get('/{lang}/noutati', function ($lang) {
    if($lang == 'en' or $lang == 'ro'){
        return redirect('/noutati', 301)->with('lang', $lang);
    }
    else{
        return abort(404);
    }
});

Route::get('/{lang}/oferte', function ($lang) {
    if($lang == 'en' or $lang == 'ro'){
        return redirect('/oferte', 301)->with('lang', $lang);
    }
    else{
        return abort(404);
    }
});

Route::get('/{lang}/oferta/{id}/{slug}', function ($lang, $id, $slug) {
    if($lang == 'en' or $lang == 'ro'){
    return redirect('/oferte/'.$slug, 301)->with('lang', $lang); 
}
else{
    return abort(404);
}
});

Route::get('/oferta/{id}/{slug}', function ($id, $slug) {
    return redirect('/oferte/'.$slug, 301); 
});

Route::get('/{lang}/informatie/{id}/{slug}', function ($lang, $id, $slug) {
    if($lang == 'en' or $lang == 'ro'){
    return redirect('/info/'.$slug, 301)->with('lang', $lang); 
}
else{
    return abort(404);
}
});

Route::get('/informatie/{id}/{slug}', function ($id, $slug) {
    return redirect('/info/'.$slug, 301); 
});

Route::get('/{lang}/noutate/{id}/{slug}', function ($lang, $id, $slug) {
    if($lang == 'en' or $lang == 'ro'){
    return redirect('/noutati/'.$slug, 301)->with('lang', $lang); 
}
else{
    return abort(404);
}
});

Route::get('/{lang}/echipa-membru/{id}/{slug}', function ($lang, $id, $slug) {
    if($lang == 'en' or $lang == 'ro'){
    return redirect('/membru/'.$slug, 301)->with('lang', $lang); 
}
else{
    return abort(404);
}
});

Route::get('/echipa-membru/{id}/{slug}', function ($id, $slug) {
    return redirect('/membru/'.$slug, 301); 
});


Route::get('/{lang}/caz/{id}/{slug}', function ($lang, $id, $slug) {
    if($lang == 'en' or $lang == 'ro'){
    return redirect('/caz/'.$slug, 301)->with('lang', $lang); 
}
else{
    return abort(404);
}
});

Route::get('/caz/{id}/{slug}', function ($id, $slug) {
    return redirect('/caz/'.$slug, 301); 
});

Route::get('/{lang}/serviciu/{id}/{slug}', function ($lang, $id, $slug) {
    if($lang == 'en' or $lang == 'ro'){
    return redirect('/servicii/'.$slug, 301)->with('lang', $lang); 
}
else{
    return abort(404);
}
});

Route::get('/serviciu/{id}/{slug}', function ($id, $slug) {
    return redirect('/servicii/'.$slug, 301); 
});

