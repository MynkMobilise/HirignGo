<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Job;
use App\Models\User;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logged_id = Auth::user()->id;
        $jobs = Job::where('employer_id',$logged_id)->get();
        return view('admin/jobs/jobs-list',compact('jobs'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result['title']= '';
        $result['description']= '';
        $result['requirements']= '';
        $result['location']= '';
        $result['salary']= '';
        return view('admin/jobs/post-job',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input  = $request->all();

        
        $user_id = Auth::user()->id;
        $model = new Job;
        $model->employer_id = $user_id;
        $model->title = $input['title'];
        $model->description = $input['desc'];
        $model->location = $input['loc'];
        $model->requirements = $input['requirement'];
        $model->salary = $input['sal'];
        $model->posting_date = date('Y-m-d');
        $model->save();
        // return redirect('route("jobs.jobs-list")');
        return redirect()->route('jobs.jobs-list');
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr = Job::where('id',$id)->get();
        $result['title']=$arr['0']->title;
        $result['description']=$arr['0']->description;
        $result['requirements']=$arr['0']->requirements;
        $result['location']=$arr['0']->location;
        $result['salary']=$arr['0']->salary;
        return view('admin/jobs/post-job',$result);
    }

    public function apply($id)
    {
        $logged_id = Auth::user()->id;
        $data['user_id'] = $logged_id;
        $data['job_id'] = $id;

        // DB::insert($data);
        DB::table('job_applications')->insert($data);

        $liveCamps = Job::where('status',0)->get();
        return view(RouteServiceProvider::CandDashboard.'/dashboard',compact('liveCamps'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}