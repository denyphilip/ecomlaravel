<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts=ContactUs::latest()->paginate(2);
        return view('admin.pages.showcontact',compact('contacts'));
    }

}