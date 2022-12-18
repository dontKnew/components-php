<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class HomeController extends BaseController
{
    public function index()
    {
        word_limiter()
        return view ("website/home");
    }
}
