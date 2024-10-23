<?php

namespace App\Http\Controllers;
use App\Models\Job;

use Illuminate\Http\Request;

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

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);
    // redirect back to the uodated job
    return redirect('jobs/');

}



// edit a Job page
public function edit (job $job){
    return view('jobs.edit', ['job' => $job]);
    
}

// Update a job action
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
