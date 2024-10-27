<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth as  AuthAttribute;
use Illuminate\Support\Facades\Auth as AuthFacades; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;


class RegisteredUserController extends Controller
{
    public function create(){
       return view("auth.register");
    }

    public function store(){
        //validate
       $validatedattributes = request()->validate([
            'first_name' => ['required'],
            'last_name'=> ['required'],
            "email"=> ['required','email'],
            "password"=>['required','min:6','confirmed'],
        ]);

        $user = User::create($validatedattributes); 
        //login
        Auth::login($user);
        //redirect somewhere
        return redirect('/jobs');
    }
 








}
 