<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $data = Coupon::paginate(2);
        return view('admin.pages.showcoupon', compact('data'));
    }

   
    public function create()
    {
        return view("admin.pages.addcoupon");
    }

   
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "code" => "required|unique:coupons",
            "type" => "required",
            "cart_value" => "required",
            "value" => "required",
            "status" => "required",
        ]);
        if ($validateData) {
            Coupon::insert([
                "code" => $request->code,
                "type" => $request->type,
                "cart_value" => $request->cart_value,
                "value" => $request->value,
                "status" => $request->status
            ]);
            return redirect("coupons");
        }
        else{
            return back()->with('error', "something went wrong") ;
        }
    }


    public function edit($id)
    {
        $data = Coupon::where('id', $id)->first();
        return view('admin.pages.updatecoupon', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            "code" => "required",
            "type" => "required",
            "cart_value" => "required",
            "value" => "required",
            "status" => "required",
        ]);
        if ($validateData) {
            Coupon::where('id', $id)->update([
                "code" => $request->code,
                "type" => $request->type,
                "cart_value" => $request->cart_value,
                "value" => $request->value,
                "status" => $request->status
            ]);
            return redirect('coupons');
        }
        else{
            return back()->with('error', "something went wrong") ;
        }
    }

    public function destroy($id)
    {
        $coupondata=Coupon::find($id);
        $coupondata->delete();
       
    }
}
