<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Captcha;

class CaptchaController extends Controller
{
    public function reloadCaptcha(){

        return response()->json(['captcha'=> captcha_img('math')]);
    }
}
