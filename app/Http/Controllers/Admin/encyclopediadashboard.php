<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class encyclopediadashboard extends Controller
{
    //
    public function addbrand(){
      return view('admin.encyclopedia.addbrand');
    }

    public function addgeneration(){
      return view('admin.encyclopedia.addgeneration');
    }

    public function addmodel(){
      return view('admin.encyclopedia.addmodel');
    }
}
