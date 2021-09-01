<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view ('home');
    }
    public function beranda(){
        return view ('beranda');
    }
    public function berandalpk(){
        return view ('berandalpk');
    }
}
