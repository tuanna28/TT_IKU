<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use PHPUnit\Event\TestSuite\Loaded;

class CartController extends Controller
{
    protected $cart;
    protected $book;
    protected $user;
    protected $order;
    public function __construct(Book $book, Cart $cart, User $user, Order $order)
    {
        $this->book = $book;
        $this->cart = $cart;
        $this->user = $user;
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $carts

            = DB::table('carts')
                ->select('carts.quantity', 'carts.money', 'books.title_book', 'books.book_image', 'carts.id')
                ->join('books', 'books.id', '=', 'carts.book_id')
                ->where('carts.user_id','=',  Auth::user()->id )
                ->get();
  
        return view('client.carts.index', ['carts' => $carts]);
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
        $user = Auth::user();
        $book = $this->book->findOrFail($request->book_id);

        $cartBook = $this->cart->getBy1($book->id);
        if ($cartBook) {
            $quantity = $cartBook->quantity;
            $cartBook->update(['quantity' => ($quantity + $request->qty)]);
        } else {
            $dataCreate['user_id'] = $user->id;
            $dataCreate['book_id'] = $request->book_id;
            $dataCreate['quantity'] = $request->qty ?? 1;
            $dataCreate['money'] = $book->price;
            $dataCreate['book_id'] = $request->book_id;
            $this->cart->create($dataCreate);
        }
        ;
  
        return redirect()->back()->with(['message' => 'Thêm Vào Giỏ Hàng Thành Công']);
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
    public function destroy($id)
    {

    }
    public function updateCart(Request $request, $id){
        $quantity = $request->input('quantity');
        $cart = DB::table('carts')->where('id', $id)->update(['quantity'=> $quantity]);
        return redirect()->back()->with(['message'=> '']);
    }
    public function deleteCart($id)  {
        $cart = Cart::find($id);
       $cart->delete();
       return redirect()->back()->with(['message'=> '']);
    }
    public function checkout(){

     
        $user = $this->user->findOrFail(Auth::user()->id);
        $carts
        = DB::table('carts')
        ->select('carts.quantity', 'carts.money', 'books.title_book', 'books.book_image', 'carts.id')
        ->join('books', 'books.id', '=', 'carts.book_id')
        ->where('carts.user_id','=',  Auth::user()->id )
        ->get();
  
        return view('client.carts.checkout', ['carts'=> $carts, 'user' => $user]);
      
    }

    public function vnpay_payment(){
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://127.0.0.1:8000/checkout";
$vnp_TmnCode = "ZXS6CHXE";//Mã website tại VNPAY 
$vnp_HashSecret = "NHYUIVZYRJANNQZTZYCIFGETKCMLWXRJ"; //Chuỗi bí mật

$vnp_TxnRef = '123'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = 'Thanh toàn đơn hàng test';
$vnp_OrderType = 'billpayment';
$vnp_Amount =20000 * 100;
$vnp_Locale = 'vn';
$vnp_BankCode = 'NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
// $vnp_ExpireDate = $_POST['txtexpire'];
//Billing

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef

   
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
       die(); 
    } else {
        echo json_encode($returnData);
    }
	// vui lòng tham khảo thêm tại code demo
    }
public function processCheckout(Request $request) {
  
    $dataCreate1['name'] = $request->customer_name;
    $dataCreate1['phone'] = $request->customer_phone;
    $dataCreate1['address'] = $request->customer_address;
    $dataCreate1['status'] = 'Đang xử lý' ;
    $dataCreate1['email'] = $request->customer_email;
    $dataCreate1['note'] = $request->note;
    $dataCreate1['ship'] = $request->ship;
    $dataCreate1['total'] = $request->total;
    $dataCreate1['id_cart'] = $request->id_cart;
    $dataCreate1['id_customer'] = Auth::user()->id;
    $dataCreate1['payment'] = "Nhận Hàng Thanh Toán";
    $dataCreate1['date'] = new DateTime('now');
    $this->order->create($dataCreate1);
    // XÓa giở hàng đẵ order
    $cart = $this->cart->getBy2(Auth::user()->id);
    $cart->delete();      
    return redirect()->back()->with('success', 'Đặt hàng thành công! Cảm ơn bạn đã mua hàng của shop ♥');
  

}
}
