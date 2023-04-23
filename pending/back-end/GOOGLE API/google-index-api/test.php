<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\CourseCategoryModel;
use App\Models\CourseModel;
use App\Models\FAQSModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $courseMoel = new CourseModel();
        $courseCategory = new CourseCategoryModel();
        $faqs = new FAQSModel();
        $data = [
            "dashboard"=>"active",
            "course"=>count($courseMoel->findAll()),
            "parent_category"=>count($courseCategory->findAll()),
            "faqs"=>count($faqs->findAll()),
        ];

        return view('admin/dashboard');
    }


}
