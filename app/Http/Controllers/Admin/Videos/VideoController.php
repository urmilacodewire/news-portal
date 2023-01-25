<?php

namespace App\Http\Controllers\Admin\Videos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Videos\Video;
use DB;

class VideoController extends Controller
{
    public function index()
    {
        $data['videos'] = Video::orderBy('order','ASC')->get();
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        $data['videos'] = DB::table('posts')->where('type','Videos')->get();
        return view('admin.videos.index', $data);
    }

    public function create()    
    {
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        $data['title'] = 'Create Video';
        return view('admin.videos.add-edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required','category'=>'required','type'=>'required' ,'videofile'=>'required','popular'=>'nullable']);
        $input = $request->all();
        // $file = time().'Video'.rand('1000','9999').'.'.$request->videofile->extension();
        // $request->videofile->move(public_path('videos'),$file);
        // $input['videofile'] = $file;

        // $bannerfile = time().'Video-banner'.rand('1000','9999').'.'.$request->bannerfile->extension();
        // $request->bannerfile->move(public_path('images'),$bannerfile);
        // $input['bannerfile'] = $bannerfile;
        $slug  = str_replace(' ', '_', $request->title);
        $insert = Video::create($input);
        DB::table('posts')->where('id',$insert->id)
                          ->update([
                            'slug' => $slug.'-'.$insert->id
                          ]);
        Session::flash('success', 'Video is Added Successfuly');
        return back();  
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        $videos = Video::findOrFail($id);
        $data['videos'] = $videos;
        $data['title'] = 'Edit Video';
        return view('admin.videos.add-edit', $data);
    }

    public function update(Request $request, $id)
    {
        $videos = Video::findOrFail($id);
        $request->validate(['title' => 'required','category'=>'required','type'=>'required','videofile'=>'required','popular'=>'nullable']);
        $input = $request->all();
        if($request->popular == ''){
         $input['popular'] = 'off';
        }else{$input['popular'] = 'on';}
        $slug  = str_replace(' ', '_', $request->title);
       if($request->videofile){
        // $file = time().'Video'.rand('1000','9999').'.'.$request->videofile->extension();
        // $imgdata = $request->videofile->move(public_path('videos'),$file);
        // $input['videofile'] = $file;
        //  $bannerfile = time().'Video-banner'.rand('1000','9999').'.'.$request->bannerfile->extension();
        // $request->videofile->move(public_path('images'),$bannerfile);
        // $input['bannerfile'] = $bannerfile;
        $updateid = $videos->update($input);
        
       }
       else{
        $updateid = $videos->update($input);
        
       }
        Session::flash('success', 'Video is Updated Successfully');
        return back();
    }

    public function destroy(Request $request , $id)
    {
        $deletes = Video::findOrFail($id);
        $deletes->delete();
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['message' => 'Video is Deleted Successfully', 'status' => true]);
        }
        Session::flash('success', 'Video is Deleted Successfully');
        return back();
    }

    public function status(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);

        $Brand = Video::findOrFail($request->id);
        $Brand->status = $request->status;
        $Brand->save();

        return response()->json(['message' => 'Status Changed Successfully','status' => true]);
    }

    public function sortable(Request $request)
    {
        $videos = Video::all();

        foreach ($videos as $video) {
            foreach ($request->order as $order) {
                if ($order['id'] == $video->id) {
                    $video->update(['order' => $order['position']]);
                }
            }
        }
        
        return response()->json(['message' => 'Order is Changed Successfully','status' => true]);
    }
}
