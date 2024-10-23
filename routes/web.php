<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use   Illuminate\Database\Query\Builder;


// Route Home
Route::view('/', 'home'); 
Route::resource('jobs', JobController::class);
Route::view('/contact', 'contact');    