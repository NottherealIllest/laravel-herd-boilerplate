<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use   Illuminate\Database\Query\Builder;


// Route Home
Route::view('/', 'home'); 

 // Route for Job related stuff | migrated from route closure to dedicated controller action
// Route::get('/jobs', [JobController::class, 'index'] );
// Route::get('/jobs/create', [JobController::class, 'create'] );
// Route::get('/jobs/{job}', [JobController::class, 'show'] );
// Route::post('/jobs', [JobController::class, 'store'] );
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'] );
// Route::patch('/jobs/{job}', [JobController::class, 'update'] );
// Route::delete('/jobs/{job}', [JobController::class, 'destroy'] );


//Grouping route controllers 
// Route::controller(JobController::class)->group(function(){

//     Route::get('/jobs', 'index' );
//     Route::get('/jobs/create', 'create' );
//     Route::get('/jobs/{job}', 'show' );
//     Route::post('/jobs', 'store' );
//     Route::get('/jobs/{job}/edit', 'edit' );
//     Route::patch('/jobs/{job}', 'update' );
//     Route::delete('/jobs/{job}', 'destroy' );

// });
 

Route::resource('jobs', JobController::class);

//Route for contact related stuff
Route::view('/contact', 'contact');    