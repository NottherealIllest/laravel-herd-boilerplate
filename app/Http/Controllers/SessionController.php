<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view("auth.login");

    }
    public function store(){
       // validate
       $attributes =  request()->validate([
        'email' => ['required', 'email'],
        'password'=> ['required', 'min:6'],
       ]);

       $user = Auth::attempt($attributes); 
       
       if (! Auth::attempt($attributes)){
        throw ValidationException::withMessages([ 
           'email' => 'sorry those credentials dont match.'
        ]);
      }

       //  if succeed generate user token
       request()->session()->regenerate();
       //redirect
       return redirect('/jobs');

       // if Auth fails
      

  
    } 
    public function destroy(){
        Auth::logout();
        return redirect('/'); 
    }
}
