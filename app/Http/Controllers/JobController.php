<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as AuthFacades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Mail;


class JobController extends Controller
{

    // Show All Jobs 
public function index (){
    $jobs = Job::with('employer')->orderBy('created_at', 'desc')->simplePaginate(5  );
    return view('jobs.index',  [
        'jobs' => $jobs 
    ]);
}

// create new Job page
public function create (job $job){
    return view('jobs.create');
}

// Single Job page
public function show (job $job){
    return view('jobs.show', ['job' => $job]);
}

// create a Job action
public function store (){
    request()->validate([
        'title'  => ['required', 'min:3'],
        'salary' => ['required'],
   ]);

    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

   
    Mail::to($job->employer->user->email)->queue(
        new JobPosted($job)
    );
     
      

     
    // redirect back to the uodated job
    return redirect('jobs/');

}



// edit a Job page
public function edit(Job $job)
{
  
    // Gate has been deprecated infavor of middleware, added the two gate logic's that were previously used    
    // Gate::authorize('edit-job', $job);
    // if (!Gate::allows('edit-job', $job)) {
    //     abort(403, 'Unauthorized action.');
    // }

    return view('jobs.edit', ['job' => $job]);  
  
}

// Update a  job action
public function update (job $job){
    request()->validate([
        'title'  => ['required', 'min:3'],
        'salary' => ['required'],
   ]);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    // redirect back to the uodated job
    return redirect('jobs/'. $job->id);

}

// Delete a Job
public function destroy  (job $job){
    $job->delete();
    return redirect('/jobs');
}


}
