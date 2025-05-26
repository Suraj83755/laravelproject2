<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Demo extends Controller
{
    public function view(){
        return view('index');
    }

}
