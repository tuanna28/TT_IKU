<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;



use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function index(){
        $orders =  $this->order->all();
        return view("admin.orders.index", compact('orders'));
    }
    public function updateStatus(Request $request ,$id)
    {
        $status = $request->input('status');
        $order = DB::table('orders')->where('id', $id)->update(['status'=> $status]);
        return redirect()->back()->with(['message'=> '']);

    }
}
