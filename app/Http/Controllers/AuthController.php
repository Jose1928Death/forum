<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(){
        return Inertia::render('Auth/Login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $credential=$request->only('email','password');
        if(Auth::attempt($credential)){
            return redirect('/')->with('success','Welcome '.Auth::user()->name);
        }
    }

    public function register(){
        return Inertia::render('Auth/Register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'name'=>'required',
            'password'=>'required|min:8',
            'email'=>'required|unique:users',
            'image'=>'image|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file("image");
        $image_name=uniqid().str_replace('','', $image->getClientOriginalName());
        $image_path='/images/profile/';
        $image->move(public_path('images/profile'), $image_name);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'image'=>$image_path.$image_name
        ]);
        $credential=$request->only('email','password');
        if(Auth::attempt($credential)){
            return Redirect::route('home');
        }
    }
    public function logout(){
        Auth::logout();
        return Redirect::route('login');
    }
}
