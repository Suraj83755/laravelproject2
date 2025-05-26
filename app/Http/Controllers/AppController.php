<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userdata;
use Illuminate\Support\Facades\DB;
class AppController extends Controller
{
    public function index(){
        //insert
        /*$userdata=new userdata;
        $userdata->name="Suraj";
        $userdata->email="suraj@gmail.com";
        $userdata->save();
        return "Database Operations";*/
        return view('form');

    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|lowercase',
            'address'=>'required',
        ],[
            'name.required'=>'Name is Suraj',
            'email.lowercase'=>'Lowercase only',
            'address.required'=>'address is needed'
        ]);
        $data= new userdata;
        $data->name=$request['name'];
        $data->email=$request['email'];
        $data->address=$request['address'];
        $data->gender=$request['gender'];
        $data->save();
        return redirect('/view');
    }
    public function view(){
        $var=userdata::all();
        $value=compact('var');
        return view('table')->with($value);
    }

    public function delete($id){
        userdata::find($id)->delete();
        return redirect()->back();
    }
        
    public function update(Request $request ,$id){
        $item=userdata::findorfail($id);
        $item->name=$request->input('name');
        $item->email=$request->input('email');
        $item->address=$request->input('address');
        $item->gender=$request->input('gender');
        $item->save();
        return redirect('view');
        }
    
    public function edit($id){
        $item=userdata::findorfail($id);
        return view('edit',compact('item'));
        }
        
}


