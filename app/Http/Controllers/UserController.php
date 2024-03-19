<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = User::select('name','email')->where('role',0)->get();
        return view('admin/users/candidates',compact('candidates'));
    }
    
    public function appliedCandList()
    {
        $candidates = DB::table('job_applications as ja')
                      ->select('*')
                      ->leftJoin('users as us','us.id', '=', 'ja.user_id')
                      ->leftJoin('jobs as jb','jb.id', '=', 'ja.user_id')
                      ->get();
        // $candidates = User::select('name','email')->where('role',0)->get();
        return view('admin/users/applied-candidate',compact('candidates'));
    }

    public function shortlistedCandList()
    {
        $candidates = DB::table('job_applications as ja')
                      ->select('*')
                      ->leftJoin('users as us','us.id', '=', 'ja.user_id')
                      ->leftJoin('jobs as jb','jb.id', '=', 'ja.user_id')
                      ->where('ja.is_shortlisted',1)
                      ->get();
        // $candidates = User::select('name','email')->where('role',0)->get();
        return view('admin/users/shortlisted-candidate',compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/jobs/jobs-list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Job $job)
    {
        //
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
