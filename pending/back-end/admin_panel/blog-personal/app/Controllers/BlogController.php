<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class BlogController extends BaseController
{
    public function index()
    {
        return view("website/blog");
    }

    public function viewPost()
    {
        return view("website/view_post");
    }
}
