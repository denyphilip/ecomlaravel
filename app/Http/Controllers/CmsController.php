<?php

namespace App\Http\Controllers;
use App\Models\Cms;
use Illuminate\Http\Request;

class CmsController extends Controller
{
   
    public function index()
    {
        $cmss= Cms::latest()->paginate(2);
        return view('admin.pages.showcms',compact('cmss'));
    }

  
    public function create()
    {
        return view('admin.pages.addcms');
    }

  
    public function store(Request $req)
    {
        $validate=$req->validate([
            'title'=>'required|min:5|max:150',
            'body'=>'required|min:6|max:255',
            'image'=>'required|mimes:jpg,png,jpeg',
        ]);
    if($validate){
       $title=$req->title;
       $body=$req->body;
       $file=$req->file('image');
       $dest=public_path('/uploads');
       $fname="Image-".rand()."-".time().".".$file->extension();
       if($file->move($dest,$fname))
       {
           Cms::create([
            'title'=>$title,
            'body'=>$body,
            'image'=>$fname,

           ]);
            return redirect("cms");
        }
        else{
               $path=public_path()."uploads/".$fname;
               unlink($path);
               return back()->with('error','cms could not added');
           }
       }
       else {
           return back()->with('error','Uploading Error');
       }
    }


  
    public function edit($id)
    {
        $cms=Cms::where('id',$id)->first();
        return view('admin.pages.updatecms',compact('cms'));
    }

 
    public function update(Request $req, $id)
    {
        $validate=$req->validate([
            'title'=>'required|min:5|max:150',
           
            'image'=>'required|mimes:jpg,png,jpeg',
        ]);
    if($validate){
        $title=$req->title;
        $body=$req->body;
       $file=$req->file('image');
       $dest=public_path('/uploads');
       $fname="Image-".rand()."-".time().".".$file->extension();
       if($file->move($dest,$fname))
       {
           Cms::where('id',$id)->update([
            'title'=>$title,
            'body'=>$body,
            'image'=>$fname,

           ]);
            return redirect("cms");
        }
        else{
               $path=public_path()."uploads/".$fname;
               unlink($path);
               return back()->with('error','cms could not added');
           }
       }
       else {
           return back()->with('error','Uploading Error');
       }
    }


    public function destroy($id)
    {
        $cmsdata=Cms::find($id);
        $imagepath=$cmsdata->image;
        unlink('uploads/'.$imagepath);
        $cmsdata->delete();
    }
}
