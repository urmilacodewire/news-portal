<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(){
        
        $data['banners'] = DB::table('posts')->where('type','banner')->count();

        $data['posts'] = DB::table('posts')->where('type','Blogs')->count();

        $data['epapers'] = DB::table('posts')->where('type','PDF')->count();

        $data['videos'] = DB::table('posts')->where('type','Videos')->count();

        // $data['pendingAppoint'] = DB::table('appointments')
        // ->where('userid',Auth::User()->id)
        // ->where('status','0')
        // ->count();
        return view('admin.dashboard',$data);
    }
}
