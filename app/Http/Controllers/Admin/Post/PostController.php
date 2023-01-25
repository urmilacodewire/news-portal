<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Post\Post;
use DB;

class PostController extends Controller
{
    
    public function index()
    {
        $data['posts'] = Post::orderBy('order','ASC')->get();

        $data['posts'] = DB::table('posts')->where('type','Blogs')->get();
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        return view('admin.posts.index', $data);
    }

    public function create()
    {
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        $data['title'] = 'Create Post';
        return view('admin.posts.add-edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required','category'=>'required','type'=>'required' ,'description' => 'required','image'=>'required|mimes:jpg,png,jpeg,pdf|max:2048','meta_title'=>'required','meta_keyword'=>'required','meta_desc'=>'required','popular'=>'nullable']);
        $input = $request->all();
        //dd($input);
        $file = time().'Image'.rand('1000','9999').'.'.$request->image->extension();
        $request->image->move(public_path('images'),$file);
        $input['image'] = $file;
        $slug  = str_replace(' ', '_', $request->title);
        $insert = Post::create($input);

        DB::table('posts')->where('id',$insert->id)
                          ->update([
                            'slug' => $slug.'-'.$insert->id
                          ]);
        Session::flash('success', 'Post is Added Successfuly');
        return back();  
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        $post = Post::findOrFail($id);
        $data['posts'] = $post;
        $data['title'] = 'Edit Post';
        return view('admin.posts.add-edit', $data);
    }
   
    public function update(Request $request, $id)
    {

        $post = Post::findOrFail($id);
        $request->validate(['title' => 'required','category'=>'required','type'=>'required', 'description' => 'required','image'=>'nullable|mimes:jpg,png,jpeg,pdf|max:1024','meta_title'=>'required','meta_keyword'=>'required','meta_desc'=>'required','popular']);
        $input = $request->all();
        if($request->popular == ''){
         $input['popular'] = 'off';
        }else{$input['popular'] = 'on';}
        $slug  = str_replace(' ', '_', $request->title);
       if($request->image){
        $file = time().'Image'.rand('1000','9999').'.'.$request->image->extension();
        $imgdata = $request->image->move(public_path('images'),$file);
        $input['image'] = $file;
        $updateid = $post->update($input);
        
       }
       else{
        $updateid = $post->update($input);
        
       }
        Session::flash('success', 'Post is Updated Successfully');
        return back();
    }

    public function destroy(Request $request , $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['message' => 'Post is Deleted Successfully', 'status' => true]);
        }
        Session::flash('success', 'Post is Deleted Successfully');
        return back();
    }

    public function uploadImage(Request $request)
    {
        if($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $request->file('upload')->move('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/'.$filenametostore);
            $message = 'File uploaded successfully';
            $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $result;
        }
    }

    public function status(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);

        $Brand = Post::findOrFail($request->id);
        $Brand->status = $request->status;
        $Brand->save();

        return response()->json(['message' => 'Status Changed Successfully','status' => true]);
    }

     public function sortable(Request $request)
    {
       
        $posts = Post::all();

        foreach ($posts as $post) {
            foreach ($request->order as $order) {

                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                   
                }
            }
        }
        
        return response()->json(['message' => 'Order is Changed Successfully','status' => true]);
    }
}

