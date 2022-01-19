<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\UsedCoupon;
use App\Models\UserAddress;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        $ordercnt=OrderProduct::count();
        $usercnt=User::count();
        $productcnt=Product::count();
        return view('admin.pages.dashboard',compact('ordercnt','usercnt','productcnt'));
    }
    public function viewOrder()
    {
        $products=[];
        $orderPro=[];
        $orders=Order::join('user_addresses','orders.address_id','=','user_addresses.id')->select('orders.id as oid','orders.amount as amount','user_addresses.*')->get();
        foreach($orders as $o){
            $opdata=OrderProduct::join('products','order_products.product_id','=','products.id')->where('order_id',$o->oid)->get();
            $user=User::where('id',$o->user_id)->first();
            foreach($opdata as $op){
                $orderPro[]=Product::where('id',$op->product_id)->first();
            }
            $products[]=[$o,$orderPro,$user];
            $orderPro=[];
        }
        return view('admin.pages.orders',['orders'=>$products]);
    }

    public function exportCsv(Request $request)
    {
   $fileName = 'users.csv';
   $tasks = User::join('roles','roles.id','=','users.role_id')->get(['users.*','roles.role_name as role']);

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Id', 'firstName', 'LastName', 'email', 'role');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Id']  = $task->id;
                $row['FirstName']    = $task->firstname;
                $row['LastName']    = $task->lastname;
                $row['email']  = $task->email;
                $row['role']  = $task->role;
                

                fputcsv($file, array($row['Id'], $row['FirstName'], $row['LastName'], $row['email'], $row['role']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    public function report(){
        return view('admin.pages.report');
    }


    public function exportOrderCsv(Request $request)
    {
   $fileName = 'Orders.csv';
//    $tasks=Order::join('user_addresses','orders.address_id','=','user_addresses.id')->get();
  $tasks=Order::join('user_addresses','orders.address_id','=','user_addresses.id')->
    join('order_products','orders.id','=','order_products.order_id')
    ->join('users','users.id','=','orders.user_id')
    ->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
        );

        $columns = array('Id', 'First Name', 'Last Name' ,'email','address','amount','status');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Id']  = $task->order_id;
                $row['First Name']    = $task->firstname;
                $row['Last Name']    = $task->lastname;
                $row['email']  = $task->email;
                $row['address']    = $task->address;
                $row['amount']=$task->amount;
                $row['status']=$task->status;
                fputcsv($file, array($row['Id'], $row['First Name'],$row['Last Name'],$row['email'],$row['address'],$row['amount'],$row['status'] ));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
}

}
