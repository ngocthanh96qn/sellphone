<?php

namespace App\Http\Controllers\User;

use App\Order;
use App\Order_detail;
use App\User;
use App\Guest;
use App\Product;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Auth;
use Mail;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function userCheckout(){
      $cart = Session::get('cart');
      $user = Auth::user();
      return view('user.checkout',compact('cart', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    { 
      
      $dataOrder = [
        'user_id' => Auth::user()->id,
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => Auth::user()->email,
        'address' => $request->address,
        'status_id' =>'1',
        'deliverer_id' => '1',
        'total_price' => Session::get('cart')->totalPrice,
        'note' =>$request->note
      ];
      $order = Order::create($dataOrder);
      $order_id=$order->id;
      foreach (Session::get('cart')->items as $key => $value) {
       $dataOrderDetail = [
        'order_id' => $order_id,
        'product_id' => $value['item']->id,
        'sale_quantity'=>$value['qty'],
        'price'=>$value['price']
      ];
      $order = Order_detail::create($dataOrderDetail);

    }
    session()->forget('cart');
    return redirect()->route('feedback',$order_id);   
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function addFeedback($orderId)
    {
      $user= Order::find($orderId);

      if ((Order::find($orderId)->user_id)==null) { 
        $guest_id = Order::find($orderId)->guest_id;
        $name = Guest::find($guest_id)->name;
        $phone = Guest::find($guest_id)->phone;
        $address = Guest::find($guest_id)->address;
      }
      else { 

        $user_id = Order::find($orderId)->user_id;
        $name = User::find($user_id)->fullname;
        $phone = User::find($user_id)->phone;
        $address = User::find($user_id)->address;
      }
      $note = Order::find($orderId)->note;
      $order_id = $orderId;
      $total = number_format( Order::find($orderId)->total_price);
      $listProductOfOrder = Order::find($orderId)->order_details;
      foreach ($listProductOfOrder as $key => $value) {
       $product[]=['name'=>Product::find($value->product_id)->name, 'qty'=>$value->sale_quantity, 'price'=>number_format($value->price)];
     }
     Mail::send('mailfb', array('name'=>$name,'phone'=>$phone, 'address'=>$address,'order_id'=>$order_id ,'product'=>$product,'total'=>$total,'note'=>$note), function($message) use ($user) {
      $message->to($user->email, 'Khách hàng')->subject('Thông tin đơn hàng!');
    });
     Session::flash('flash_message', 'Send message successfully!');

     return view('guest.success');
   }
   public function show(Request $request)
   {


   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,$status)
    {
     $order = Order::find($id);
     if ($status== 1) {
      $data=['status_id'=> 4];
    }
    elseif ($status==4){
     $data=['status_id'=> 1];
   }


   $order->update($data);

   return redirect()->route('user.Account');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
  }
