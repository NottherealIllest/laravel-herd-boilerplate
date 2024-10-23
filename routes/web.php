<?php
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use   Illuminate\Database\Query\Builder;


// Route for all jobs
Route::get('/', function () {
    return view(view: 'home');
});

 // Show Jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->orderBy('created_at', 'desc')->simplePaginate(5  );
    return view('jobs.index',  [
        'jobs' => $jobs 
       
    ]);
});
 
 // Create
Route::get('/jobs/create', function (){
 return view('jobs.create');
    }); 
  
   // Show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    
    return view('jobs.show', ['job' => $job]);
});

//edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

//update
Route::patch ('/jobs/{id}', function ($id) {

    //validate
    request()->validate([
        'title'  => ['required', 'min:3'],
        'salary' => ['required'],
   ]);

 
    //authorize (on .. hold)
    //uodate the job
    $job = job::findOrFail($id);

    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    // redirect back to the uodated job
    return redirect('jobs/'. $job->id);

});


//destroy
Route::delete  ('/jobs/{id}', function ($id) {

    // authorize

    //delete
    job::findOrFail($id)->delete();
    return redirect('/jobs');
   
});

Route::post('/job s', function (){

    request()->validate([
         'title'  => ['required', 'min:3'],
         'salary' => ['required'],
    ]);


    job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
 }); 


Route::get('/contact', function () {
    return view(view: 'contact');
});