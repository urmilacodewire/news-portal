<?php

namespace App\Http\Controllers\Admin\Epaper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Epaper\Epaper;
use DB;

class EpaperController extends Controller
{
   
    public function index()
    {
        $data['epaper'] = Epaper::orderBy('order','ASC')->get();
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        $data['epaper'] = DB::table('posts')->where('type','PDF')->get();
        return view('admin.epaper.index', $data);
    }

    public function create()
    {   
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        $data['title'] = 'Create E-Paper';
        return view('admin.epaper.add-edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required','category'=>'required','type'=>'required','e_file'=>'required|mimes:jpg,png,jpeg,pdf|max:1024','bannerfile'=>'required|mimes:jpg,png,jpeg,pdf|max:1024','meta_title'=>'required','meta_keyword'=>'required','meta_desc'=>'required','popular'=>'nullable']);
        $input = $request->all();
        $file = time().'Epaper'.rand('1000','9999').'.'.$request->e_file->extension();
        $request->e_file->move(public_path('images'),$file);
        $input['e_file'] = $file;

        $bannerfile = time().'Epaper-banner'.rand('1000','9999').'.'.$request->bannerfile->extension();
        $request->bannerfile->move(public_path('images'),$bannerfile);
        $input['bannerfile'] = $bannerfile;
        $slug  = str_replace(' ', '_', $request->title);
        $insert = Epaper::create($input);
        DB::table('posts')->where('id',$insert->id)
                          ->update([
                            'slug' => $slug.'-'.$insert->id
                          ]);
        Session::flash('success', 'E-Paper is Added Successfuly');
        return back();  
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['categories'] = DB::table('categories')->where('status',1)->pluck('name','id');
        $epaper = Epaper::findOrFail($id);
        $data['epaper'] = $epaper;
        $data['title'] = 'Edit E-Paper';
        return view('admin.epaper.add-edit', $data);
    }

    public function update(Request $request, $id)
    {
        $epaper = Epaper::findOrFail($id);
        $request->validate(['title' => 'required','category'=>'required', 'type'=>'required','e_file'=>'nullable|mimes:jpg,png,jpeg,pdf|max:1024','meta_title'=>'required','meta_keyword'=>'required','meta_desc'=>'required','popular'=>'nullable']);
        $input = $request->all();
        if($request->popular == ''){
         $input['popular'] = 'off';
        }else{$input['popular'] = 'on';}
        $slug  = str_replace(' ', '_', $request->title);
       if($request->e_file){
            $file = time().'Epaper'.rand('1000','9999').'.'.$request->e_file->extension();
            $request->e_file->move(public_path('images'),$file);
            $input['e_file'] = $file;
            $bannerfile = time().'Epaper-banner'.rand('1000','9999').'.'.$request->bannerfile->extension();
            $request->bannerfile->move(public_path('images'),$bannerfile);
            $input['bannerfile'] = $bannerfile;
            $updateid =  $epaper->update($input);
            
       }
       else{
           $updateid = $epaper->update($input);
           
       }
        Session::flash('success', 'E-Paper is Updated Successfully');
        return back();
    }

    public function destroy(Request $request,$id)
    {
        $epaper = Epaper::findOrFail($id);
        $epaper->delete();
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['message' => 'E-Paper is Deleted Successfully', 'status' => true]);
        }
        Session::flash('success', 'E-Paper is Deleted Successfully');
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

        $Brand = Epaper::findOrFail($request->id);
        $Brand->status = $request->status;
        $Brand->save();

        return response()->json(['message' => 'Status Changed Successfully','status' => true]);
    }

    public function sortable(Request $request)
    {
        $epaper = Epaper::all();

        foreach ($epaper as $epapers) {
            foreach ($request->order as $order) {
                if ($order['id'] == $epapers->id) {
                    $epapers->update(['order' => $order['position']]);
                }
            }
        }
        
        return response()->json(['message' => 'Order is Changed Successfully','status' => true]);
    }
}
