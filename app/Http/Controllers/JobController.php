<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class JobController extends Controller
{
    

   public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
        $jobs= Job::paginate(15);
 return view('jobs.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    

        //
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
   public function store(Request $input)
    {
        //$this->validatorCreate($request->all())->validate();

  $employer=Auth::user();
        $job = new Job();
        $job->title = $input->title;
        $job->detail = $input->detail;
        $job->job_category = $input->job_category;
        $job->budget = $input->budget;
        $job->required_skill = $input->required_skill;
        $job->job_type = $input->job_type;
        $job->job_feature = $input->job_feature;
        $job->attachment = 'uploaded.png';
        $job->deadline = $input->deadline;
        $job->status = 'pending'; 
        $job->user_id=$employer->id;
        $job->save();

 return view('jobs.show')->with(['job'=> $job,'employer'=>$employer]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
  $user=Auth::user();
  return $user->projects();
 return view('jobs.show')->with(['job'=> $job,'employer'=>$employer]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
        
       $page= new Page();
       $page->title='Jobs';
       $page->subtitle='Edit Jobs';
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

      protected function validatorCreate(array $data) {
        return Validator::make($data, [
            'title' => 'bail|required|string',
            'detail' => 'bail|required|string',
            'budget' => 'bail|required|numeric',
          
        ]);
    }
}
