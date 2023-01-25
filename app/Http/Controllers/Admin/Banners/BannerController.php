<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Banners\Banner;
use DB;


class BannerController extends Controller
{
    public function index()
    {
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        
        $data['banners'] = DB::table('posts')->where('type','Banner')->get();
        return view('admin.banners.index', $data);
    }

    public function create()
    {
         $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        
        $data['title'] = 'Create Banner';
        return view('admin.banners.add-edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required','type'=>'required','bannerfile'=>'required|mimes:jpg,png,jpeg,pdf|max:1024','position'=>'required','link'=>'required','category'=>'required']);
        $input = $request->all();
        $file = time().'Banner'.rand('1000','9999').'.'.$request->bannerfile->extension();
        $request->bannerfile->move(public_path('images'),$file);
        $input['bannerfile'] = $file;
        Banner::create($input);
        Session::flash('success', 'Banner is Added Successfuly');
        return back();  
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        
        $banner = Banner::findOrFail($id);
        $data['banners'] = $banner;
        $data['title'] = 'Edit Banner';
        return view('admin.banners.add-edit', $data);
    }   

    public function update(Request $request, $id)
    {
        $updates = Banner::findOrFail($id);
        $request->validate(['title' => 'required','type'=>'required','bannerfile'=>'nullable|mimes:jpg,png,jpeg,pdf|max:1024','position'=>'required','link'=>'required','category'=>'required']);
        $input = $request->all();
       if($request->bannerfile){
        $file = time().'Banner'.rand('1000','9999').'.'.$request->bannerfile->extension();
        $request->bannerfile->move(public_path('images'),$file);
        $input['bannerfile'] = $file;
        $updates->update($input);
       }
       else{
        $updates->update($input);
       }
        Session::flash('success', 'Banner is Updated Successfully');
        return back();
    }

}
