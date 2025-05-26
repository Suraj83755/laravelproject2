<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    //
    public function show(){
        return view('footer');
    }

    public function store(Request $request){
        $data=new Footer;
        $data->Content=$request['content'];
        $data->Mobile_No=$request['mobileno'];
        $data->save();
        $foot= Footer::all();
        // return view('footer', compact('foot'))->with('success','Footer Added Successfully');
        return back()->with('success', 'Footer Successfully Uploaded');
    }

    public function view(){
        $varb=Footer::all();
        $value=compact('varb');
        return view('index')->with($value);
    
    }
}
