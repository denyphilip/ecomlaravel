<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
   
    public function index()
    {
        $users= User::with('Role')->latest()->paginate(2);
        return view('admin.pages.showuser',compact('users'));
    }

 
    public function create()
    {
        $roles=Role::all();
        return view('admin.pages.adduser',compact('roles'));
    }

 
    public function store(Request $req)
    {
        $validate=$req->validate([
            'firstname'=>'required|min:2|alpha',
            'lastname'=>'required|min:2|alpha',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:6|max:12',
            'cpassword'=>'required|min:6|max:12|required_with:password|same:password',
         
        ]);
        if($validate){
            User::create([
                'firstname'=>$req->firstname,
                'lastname'=>$req->lastname,
                'email'=>$req->email,
                'password'=>Hash::make($req->password),
                'status'=>$req->status ?? '1',
                'role_id' => $req->role ?? '5',
            
            ]);
            return redirect('users');
        }
        else{
            return back()->with('error','All fields are required');
        }
    }

    public function edit($id)
    {
        $roles=Role::all();
        $users=User::where('id',$id)->first();
        return view('admin.pages.updateuser',compact('users','roles'));
    }

    public function update(Request $req, $id)
    {
        $validate=$req->validate([
            'firstname'=>'required|min:2|alpha',
            'lastname'=>'required|min:2|alpha',
            'email'=>'required|email',
         
        ]);
        if($validate){
            User::where('id',$id)->update([
                'firstname'=>$req->firstname,
                'lastname'=>$req->lastname,
                'email'=>$req->email,
                'status'=>$req->status,
                'role_id' => $req->role,
            
            ]);
            return redirect('users');
        }
        else{
            return back()->with('error','All fields are required');
        }
    }

    public function destroy($id)
    {
        $userdata=User::find($id);
        if($userdata->delete()){
            return response()->json(['msg'=>"user deleted"]);
        }
        else{
            return response()->json(['msg'=>"user could not be deleted"]);
        }
    
    }
}
