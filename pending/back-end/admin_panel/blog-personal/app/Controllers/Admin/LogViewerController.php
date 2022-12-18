<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CILogViewer\CILogViewer;

class LogViewerController extends BaseController
{
    public function index()
    {
//        $logViewer = new CILogViewer();
//        return $logViewer->showLogs();
        return view("admin/activity");
    }

    public function developer()
    {
        $logViewer = new CILogViewer();
        return $logViewer->showLogs();
    }
}
