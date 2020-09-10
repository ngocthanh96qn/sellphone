<?php

namespace App\Http\Controllers\User;

use App\Guest;
use App\Order;
use App\Order_detail;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\GuestRequest;
class GuestController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guestCheckout(){
            $cart = Session::get('cart'); 
            return view('guest.checkout',compact('cart'));
    }
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
    public function store(GuestRequest $request)
    {
        $dataGuest = $request->except('method','_token','note');
        $guest = Guest::create($dataGuest);

        $dataOrder = [
            'guest_id' => $guest->id,
            'status_id' =>'1',
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'deliverer_id' => '1',
            'total_price' => Session::get('cart')->totalPrice,
            'note' =>$request->note
        ];
        $order = Order::create($dataOrder);
        $order_id =$order->id;
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
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
