<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
class BannerController extends Controller
{
    
    public function index()
    {
        $banners= Banner::latest()->paginate(2);
        return view('admin.pages.showbanner',compact('banners'));
    }

    public function create()
    {
        return view('admin.pages.addbanner');
    }

    public function store(Request $req)
    {
        $validate=$req->validate([
                'caption'=>'required|min:5|max:150',
                'image'=>'required|mimes:jpg,png,jpeg',
            ]);
        if($validate){
           $caption=$req->caption;
           $file=$req->file('image');
           $dest=public_path('/uploads');
           $fname="Image-".rand()."-".time().".".$file->extension();
           if($file->move($dest,$fname))
           {
               Banner::create([
                'caption'=>$caption,
                'image'=>$fname,

               ]);
                return redirect("banners");
            }
            else{
                   $path=public_path()."uploads/".$fname;
                   unlink($path);
                   return back()->with('error','banner could not added');
               }
           }
           else {
               return back()->with('error','Uploading Error');
           }
    }

    public function edit($id)
    {
        $banner=Banner::where('id',$id)->first();
        return view('admin.pages.updatebanner',compact('banner'));
    }

    public function update(Request $req, $id)
    {
        $validate=$req->validate([
            'caption'=>'required|min:5|max:150',
            'image'=>'required|mimes:jpg,png,jpeg',
        ]);
    if($validate){
       $caption=$req->caption;
       $file=$req->file('image');
       $dest=public_path('/uploads');
       $fname="Image-".rand()."-".time().".".$file->extension();
       if($file->move($dest,$fname))
       {
           Banner::where('id',$id)->update([
            'caption'=>$caption,
            'image'=>$fname,

           ]);
            return redirect("banners");
        }
        else{
               $path=public_path()."uploads/".$fname;
               unlink($path);
               return back()->with('error','banner could not added');
           }
       }
       else {
           return back()->with('error','Uploading Error');
       }
    }

    public function destroy($id)
    {
        $bannerdata=Banner::find($id);
        $imagepath=$bannerdata->image;
        unlink('uploads/'.$imagepath);
        $bannerdata->delete();
        
    }
}
