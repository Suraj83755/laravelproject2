<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Footer;
use App\Models\News;
use App\Models\Signup;
use App\Models\Explore;
use App\Models\Icons;



class CardsController extends Controller
{
public function store(Request $request){
    $path8 = $request->file('image')->store('images', 'public');

    $data=new Card;
    $data->title=$request['cardtitle'];
    $data->content=$request['cardtext'];
    $data->image = $path8;
    $data->save();
    $var = Card::all();
    // return view('card', compact('var'));
    return back()->with('success', 'Card Successfully Uploaded');
}

// public function show(){
//     $var=userdata::all();
//     $value=compact('var');
//     return view('table')->with($value);
// }

public function storenews(Request $request){
    $request->validate([
        'image' => 'required|image|max:2048',
    ]);

    $path = $request->file('image')->store('images', 'public');

    $data1=new News;
    $data1->img=$path;
    $data1->title=$request['title'];
    $data1->Role=$request['role'];
    $data1->Date=$request['date'];
    $data1->Content=$request['content'];
    $data1->save();
    return back()->with('success', 'Image uploaded successfully.');


}


public function viewnews(){
    return view('News');
}

public function show1(){
    $var=Signup::all();
    $value=compact('var');
    return view('card')->with($value);
}


public function view(){
    $var=Card::all();
    $varb=Footer::all();
    $varc=News::all();
    $vard=Explore::all();
    $vare=Icons::where('is_active', '=', 1)->get();

    $value=compact('var','varb','varc','vard','vare');
    return view('index')->with($value);
}
}