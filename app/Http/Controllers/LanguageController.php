<?php

namespace App\Http\Controllers;

use App;
use Config;
use Illuminate\Http\Request;
use Route;
use Session;
use URL;

class LanguageController extends Controller
{
    public function switchLanguage($lang)
    {
        if (array_key_exists($lang, Config::get('localization.lang'))) {
            Session::put('applocale', $lang);
        }

        return redirect()->back();
    }
}
