<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PDF;

class FrontController extends Controller
{
    public function index()
    {
      //$data['menus'] = DB::table('categories')->where('status',1)->get();
      $data['posts'] = DB::table('posts')
                          ->where('type','Blogs')
                          ->where('status',1)
                          ->orderBy('created_at','desc')
                          ->get();

      $data['news'] = DB::table('posts')
                          ->where('type','Blogs')
                          ->where('status',1)
                          ->latest()
                          ->first();
                      // dd($data);
     // $postdata = $posts;
  //dd($posts);
      // $data['banner'] = DB::table('posts')
      //                     ->where('type','Blogs')->orderBy('id','desc')
      //                     ->get();

      // $data['postdata'] = DB::table('posts')
      //                       ->where('type','Post')
      //                       ->where('status',1)
      //                       ->latest()
      //                       ->limit(2)
      //                       ->get();
                          
       return view('index', $data);
    }
   
    public function blogs($name)
    {

      $categories  = DB::table('categories')->where('name',$name)->first();

      $data['blogs'] = DB::table('posts')
                        ->where('category',$categories->id)
                        ->where('posts.status',1)
                        ->latest()
                        ->paginate(10);
                       //dd($data);

      // $data['banner'] = DB::table('posts')
      //                   ->where('type','Post')->orderBy('id','desc')
      //                   ->orWhere('type','E-Paper')->orderBy('id','desc')
      //                   ->orWhere('type','Video')->orderBy('id','desc')
      //                   ->get();
      ////rightbar
      // $data['postdata'] = DB::table('posts')
      //                   ->where('type','Post')
      //                   ->orWhere('type','E-Paper')->orderBy('id','desc')
      //                   ->orWhere('type','Video')->orderBy('id','desc')
      //                   ->where('status',1)->latest()->limit(2)->get(); 
      //dd($data);
       return view('blogs', $data);
    }


    public function blogsdetail($slug)   
    {
      $data['menus'] = DB::table('categories')->where('status',1)->get();
      $data['blog'] = DB::table('posts')
                        ->where('slug',$slug)
                         ->join('categories','categories.id','=','posts.category')
                        ->select('posts.*','categories.name as name')
                        ->where('posts.status',1)->first();
      
      $data['banner'] = DB::table('posts')
                        ->where('type','Banner')->orderBy('id','desc')
                        ->get();
      //dd($data);
     return view('blog_detail', $data);
    }

    public function generatePDF($slug)   
    {
            $pdfdata = DB::table('posts')
                        ->where('slug',$slug)
                        ->where('status',1)->first();
            $data = [ 
                      'title' => $pdfdata->title,
                      'image' => $pdfdata->e_file
            ];
          
            $pdf = PDF::loadView('epaper-pdf', $data);
        
            return $pdf->stream('E-Paper.pdf');
    }
}
