<?php

namespace App\Providers;
use App\Clinica;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadHelpers(); // adaugi linia asta, si functia de mai jos
        // if(!(\Request::is('admin'))){
        //     $clinici = Clinica::get();
        //     $clinici = $clinici->translate(\App::getLocale(), 'ro');
        //     View::share('clinici', $clinici);
            
        // }
        
    }

    protected function loadHelpers()
    {
        foreach (glob(app_path('Helpers/*.php')) as $filename) {
            require_once $filename;
        }
    }
}
