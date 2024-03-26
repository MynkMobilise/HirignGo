<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Admin\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logged_id = Auth::user()->id;
        $result['job_count'] = DB::table('jobs')->where('status',1)->where('user_id',$logged_id)->count();
        $result['user_count'] = DB::table('users')->where('role',0)->count();
        $result['applied_count'] = DB::table('job_applications')->distinct('user_id')->count();
        $result['shortlisted_count'] = DB::table('job_applications')->distinct('user_id')->where('is_shortlisted',1)->count();
        return view(RouteServiceProvider::AdminDashboard.'/dashboard',$result);
    }

    public function userDashboard()
    {
        $logged_id = Auth::user()->id;
        $liveCamps = Job::where('status',0)->get();
        // $appply_camps = DB::table('job_applications')->where('user_id',$logged_id)->get();
        // $appply_camps = DB::table('job_applications')->get();

        // return $appply_camps;

        // foreach($liveCamps as $key=>$list)
        // {
        //     foreach($appply_camps as $data)
        //     {
        //         if($list->id == $data->job_id)
        //         {
        //             $liveCamps[$key]->applied = 1;
        //         }
        //         else
        //         {
        //             $liveCamps[$key]->applied = 0;
        //         }
        //     }
        // }
        // return $liveCamps;
        return view(RouteServiceProvider::CandDashboard.'/dashboard',compact('liveCamps'));
    }



    public function user()
    {
        return view(RouteServiceProvider::AdminUser.'/users');
    }
    
    public function login()
    {
        $logged_id = Auth::user()->id;
        $role_id = Auth::user()->role;
        if($logged_id > 0)
        {
            if($role_id == 1)
            {
                return redirect(RouteServiceProvider::DASHBOARD);
            }
            elseif($role_id == 0)
            {
                return redirect(RouteServiceProvider::UserDashboard);
            }
        }
        else
        {
        return view('admin.auth.login');
        }
    }

}
