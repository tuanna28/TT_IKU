<?php

namespace App\Http\Controllers\Client;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $cart;
    protected $book;
    protected $order;
    protected $user;
    public function __construct(Book $book, Cart $cart, Order $order, User $user) 
    {
        $this->book = $book;
        $this->cart = $cart;
        $this->order = $order;
        $this->user = $user;
    }
    public function index()
    {
       
        $orders

        = DB::table('orders')
            ->select('orders.name', 'orders.address', 'orders.email', 'orders.phone', 'orders.id', 'orders.ship', 'orders.total', 'orders.payment', 'orders.date', 'orders.note', 'orders.status')
            ->where('orders.id_customer','=',  Auth::user()->id )
            ->get();
         return view('client.orders.index', compact('orders'));

    }
    public function cancel($id){
        $order =  $this->order->FindOrFail($id);
        $order->update(['status'=>'Hủy đơn hàng']);
        return redirect()->route('client.order.index')->with(['message' => 'Hủy thành công']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
