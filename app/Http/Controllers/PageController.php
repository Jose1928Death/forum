<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home(){
        return Inertia::render("Home");
    }

    public function editProfile(){
        return Inertia::render('EditUser');
    }

    public function postEditProfile(Request $request){
        //recoger usuario del id
        $id = Auth::user()->id;
        $user = User::where("id", $id);

        if($request->password){
            $hash = Hash::make($request->password);
        }else{
            $hash = $user->first()->password;
        }
        if($file = $request->file("image")){
            $image_name = uniqid().str_replace('','',$file->getClientOriginalName());
            $path = '/images/profile/';
            $file->move(public_path($path),$image_name);
            $image_name_path = $path.$image_name;
        }else{
            $image_name_path = $user->first()->image;
        }
        //actualizar
        $user -> update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash,
            'image' => $image_name_path,
        ]);
        return redirect()->back()->with('Perfil actualizado con éxito');
    }
}
