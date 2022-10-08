<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\SEOMeta;

class SiteAuthController extends Controller
{
    public function create(Request $request)
    {
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical('https://codecasts.com.br/lesson');

        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
   
        print('done');
    }
}
