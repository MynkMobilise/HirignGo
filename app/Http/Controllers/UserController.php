<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = User::select('*')->where('role',0)->get();
        return view('admin/users/candidates',compact('candidates'));
    }

    public function getBrand()
    {
        $brands = User::select('name','email')->where('role',1)->get();
        return view('candidates/brand/brand',compact('brands'));
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

    public function myApplied()
    {
        $logged_id = Auth::user()->id;
        $appliedCamps = DB::table('job_applications')->where('user_id',$logged_id)->get();
        return view('candidates.appliedCampaings.appliedCamp',compact('appliedCamps'));
    }

    public function myProfile()
    {
        $logged_id = Auth::user()->id;
        $userDet = user::find($logged_id);
        return view('candidates.profile.profile',compact('userDet'));
    }

    public function brandProfile()
    {
        $logged_id = Auth::user()->id;
        $userDet = user::find($logged_id);
        return view('admin.profile.profile',compact('userDet'));
    }

    public function updateBrandProfile(Request $request)
    {
        $logged_id = Auth::user()->id;
        $input = $request->all();
        $model = user::find($logged_id);
        $model->name = $input['name'];
        $model->email = $input['email'];
        $model->phone = $input['phone'];
        $model->insta_link = $input['insta_link'];
        $model->ytube_link = $input['ytube_link'];
        
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as per your requirements
        ]);
        
        // Get the uploaded file
        $image = $request->file('image');
        
        // Generate a unique name for the file
        $imageName = time() . '-' . $image->getClientOriginalName();
        $model->image = $imageName;
        $model->save();
        // Move the uploaded file to the storage path
        $image->move(public_path('uploads/users'), $imageName);

        return back()->with('success', 'Image uploaded successfully.');
    }
}
