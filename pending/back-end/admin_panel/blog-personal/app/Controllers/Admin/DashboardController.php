<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ApartmentModel;
use App\Models\ApartmentStateModel;
use App\Models\HighlightApartmentModel;
use App\Models\HomeSliderModel;

class DashboardController extends BaseController
{
    public function index()
    {

        $data=  [
            "dashboard"=>"active"
            ];

        return view("admin/dashboard", $data);
    }
}
