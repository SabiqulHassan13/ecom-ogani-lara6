<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    //
    public function home () {
        return view('backend.dashboard.dashboard');
    }


}
