<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutus(){
        return view('aboutus');
    }

    public function contactus(){
        return view('contactus');
    }

    public function developer(){
        return view('developer');
    }


}
