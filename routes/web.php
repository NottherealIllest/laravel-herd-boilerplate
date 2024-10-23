<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use   Illuminate\Database\Query\Builder;


Route::view('/', 'home'); 
Route::view('/contact', 'contact');    

Route::resource('jobs', JobController::class);