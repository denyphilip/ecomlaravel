<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Configuration;
use App\Models\User;

class ConfigurationController extends Controller
{
    public function index()
    {   
        $conf=Configuration::all();
        return view('admin.pages.showconfiguration',compact('conf'));
    }

  
    public function create()
    {
        $rid=Role::where('role_name','admin')->pluck('id');
        $conf=User::where('role_id',$rid)->first();
        return view('admin.pages.addconfiguration',compact('conf'));
    }

 
    public function store(Request $request)
    {
        Configuration::create([
            "admin_email" => $request->admin_email,
            "notification_email" => $request->notification_email, 
        ]);
        return redirect('configurations');
    }

   

 
    public function edit($id)
    {
            $conf=Configuration::where('id',$id)->first();
            return view('admin.pages.updateconfiguration',compact('conf')); 
    }

   
    public function update(Request $request, $id)
    {
        $validate=$request->validate([
            "admin_email" => 'required',
            "notification_email" => 'required', 
        ]);
        if($validate){
            Configuration::where('id',$id)->update([
                "admin_email" => $request->admin_email,
                "notification_email" => $request->notification_email, 
            ]);
            return redirect('configurations');
        }
        else{
            return back()->with('error','All fields are required');
        }
    }

  
}
