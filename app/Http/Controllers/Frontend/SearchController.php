<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post\Post;
use DB;

class SearchController extends Controller
{
    public function autosearch(Request $request)
    {
      $data['blogs'] = Post::select("title")
                ->where("title","LIKE","%".$request->searchNews."%")
                ->orWhere("description","LIKE","%".$request->searchNews."%")
                ->get();

      $data['banner'] = DB::table('posts')
		      ->where('type','Banner')
		      ->orderBy('id','desc')
		      ->get();
      ////rightbar
      $data['postdata'] = DB::table('posts')
		      ->where('type','Post')
		      ->where('status',1)->latest()
		      ->limit(2)->get(); 
       return view('blogs', $data);
       return response()->json($data);	
    }
}
