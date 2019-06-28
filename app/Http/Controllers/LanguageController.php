<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLocale($locale)
    {
        Session::put('current_locale', $locale);
    }
}
