<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Query\Builder;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;



Route::get("/test", function(){
  $job = App\Models\Job::first();
      App\Jobs\TranslateJob::dispatch($job);
});
  
Route::view('/', 'home'); 
Route::view('/contact', 'contact');    

// Removed the recourse route for single routes to apply middleware, added an option that was skipped as well.
//  R oute::resource('jobs', JobController::class)->middleware('auth'); adds middleware to everything

// A way to use only and except to add middleware to grouped routes so I dont add it one by one
// Route::resource('jobs', JobController::class)->only('index','show');
// Route::resource('jobs', JobController::class)->except('index','show')->middleware('auth');


Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit-job,job']); 
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job');
Route::patch('/jobs/{job}', [JobController::class,  'update '])->middleware('auth')->can('edit', 'job');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth')->can('edit', 'job'); 







// Auth 

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

