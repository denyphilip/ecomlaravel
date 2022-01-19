<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::paginate(2);
        return view('admin.pages.showcategory',compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.addcategory');
    }


    public function store(Request $req)
    {
        $validate=$req->validate([
            'name'=>'required|min:2|unique:categories|alpha',
            'description'=>'required|min:10|max:255',
        ]);
        if($validate){
            Category::create([
                'name'=>$req->name,
                'description'=>$req->description,
            ]);
            return redirect('categories');
        }
        else{
            return back()->with('error','All fields are required');
        }
    }


    public function edit($id)
    {
        $cat=Category::where('id',$id)->first();
        return view('admin.pages.updatecategory',compact('cat'));
    }

 
    public function update(Request $req,$id)
    {
        $validate=$req->validate([
            'name'=>'required|min:2|alpha',
            'description'=>'required|min:10|max:255',
        ]);
        if($validate){
            Category::where('id',$id)->update([
                'name'=>$req->name,
                'description'=>$req->description,
            ]);
            return redirect('categories');
        }
        else{
            return back()->with('error','All fields are required');
        }
    }

   
    public function destroy($id)
    {
        $catdata=Category::find($id);
        $catdata->Product()->delete();
        $catdata->delete();
    }
}
