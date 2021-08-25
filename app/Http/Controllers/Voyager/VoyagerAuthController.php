<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerAuthController as BaseVoyagerAuthController;
use Illuminate\Http\Request;

class VoyagerAuthController extends BaseVoyagerAuthController
{
    protected function validateLogin(Request $request){
       $request->validate([
        $this->username() => 'required|string',
        'password'=>'required|string',
        'g-recaptcha-response'=>'required|captcha'
       ]);
    }
}
