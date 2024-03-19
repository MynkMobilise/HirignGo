<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
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
        $result['job_count'] = DB::table('jobs')->where('status',1)->count();
        $result['user_count'] = DB::table('users')->where('role',0)->count();
        $result['applied_count'] = DB::table('job_applications')->distinct('user_id')->count();
        $result['shortlisted_count'] = DB::table('job_applications')->distinct('user_id')->where('is_shortlisted',1)->count();
        return view(RouteServiceProvider::AdminDashboard.'/dashboard',$result);
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
                return redirect(RouteServiceProvider::DASHBOARD);
            }
        }
        else
        {
        return view('admin.auth.login');
        }
    }
}
