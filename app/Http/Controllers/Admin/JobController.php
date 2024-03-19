<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        $jobs = Job::all();
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
        return view('admin/jobs/jobs-list');
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
        $arr = Job::where('id',1)->get();
        $result['title']=$arr['0']->title;
        $result['description']=$arr['0']->description;
        $result['requirements']=$arr['0']->requirements;
        $result['location']=$arr['0']->location;
        $result['salary']=$arr['0']->salary;
        return view('admin/jobs/post-job',$result);
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