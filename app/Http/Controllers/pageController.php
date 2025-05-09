<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function iletfunction (){
        return view("iletisim");
    }
    public function hakfunction (){
        return view("hakkimizda");
    }
}
