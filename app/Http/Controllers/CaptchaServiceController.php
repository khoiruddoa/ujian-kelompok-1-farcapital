<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaServiceController extends Controller
{
    //
        public function index()
    {
        return view('captcha.index');
    }
    public function capthcaFormValidate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last name' => 'required',
            'email' => 'required|email',
            'Distric' => 'required',
            'address' => 'required',
            'Telephone' => 'required',
            'Message' => 'required',
            'username' => 'required',
            'captcha' => 'required|captcha'
        ]);
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
