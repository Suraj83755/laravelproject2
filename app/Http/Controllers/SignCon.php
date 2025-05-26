<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Signup;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\userdata;



class SignCon extends Controller
{
    public function showsignup(){
        return view('signup');
    }

    public function insert(Request $request){
       /* $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'email' => 'required|email|unique:signup,Email',
            'password' => 'required|min:6',
            'gender' => 'required|in:male,female,other',
        ]); */

        $user = new User();
        
        $user->Name = $request->name;
        $user->Age = $request->age;
        $user->Email = $request->email;
        $hashedPassword = Hash::make($request->password);
        $user->Password = $hashedPassword;
        $user->Gender = $request->gender;
        $user->save();
        return redirect('/webpage')->with('success', 'Signup successful! Please log in.');

    }

    public function loggedin(){
        return redirect('/dashboard');
    }

    public function show(Request $request){
        $search=$request->search;
        if(!empty($search)){
            $var=User::where('Name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->paginate(5)->withQueryString();
        }else{
            $var=User::paginate(5);
        }
        $value=compact('var');
        return view('dashboard')->with($value);
    }

    public function showloginform(){
        return view('loginpage');
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect()->back()->with('success', 'Item deleted successfully!');
    }

    public function update(Request $request ,$id){
        $item=User::findorfail($id);
        $item->Name=$request->input('name');
        $item->Age=$request->input('age');
        $item->email=$request->input('email');
        $item->password=$request->input('password');
        $item->Gender=$request->input('gender');
        $item->save();
        return redirect('/dashboard')->with('success', 'Item Updated successfully!');
        }

    public function edit($id){
        $items=User::findorfail($id);
        return view('editform',compact('items'));
        
    }
       
}
        


   


