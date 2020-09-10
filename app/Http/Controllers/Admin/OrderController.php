<?php

namespace App\Http\Controllers\Admin;
use App\Order;
use App\User;
use App\Deliverer;
use DB;
use App\Order_detail;
use App\Product;
use App\Status;
use Mail;
use App\Mail\Admin\OrderMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $orderInfo = Order::orderBy('created_at','DESC')->paginate(5);
       //dd($orderInfo);
        $status = Status::all();
        return view('admin.order.list', compact('orderInfo','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $orderID = Order::find($id);
        // $r = $orderID['name'];
        // dd($r);
        // $user= $orderID->toArray();
        // $userID= $user['user_id'];
        // $user = User::find($userID)->toArray();
        $order = DB::table('orders')
                ->join('order_details', 'orders.id', '=','order_details.order_id')
                ->leftjoin('products','order_details.product_id','=','products.id')
                ->select('orders.*','order_details.price','order_details.sale_quantity',  'products.name as product_name')
                ->where('orders.id','=',$id)
                ->get();
        $status = Status::all();

        return view('admin.order.orderDetail', compact('order','orderID','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $data = $request->except('_token', '_method');
        $order->update($data);
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $order = Order::find($id);
        // $order->delete();
        // return redirect()->route('order.index');
    }
    public function sendMail($id){
        $orderID = Order::find($id);
        $mail_order= $orderID->toArray();
        //dd($mail_order);
        // $userID= $user['user_id'];
        // $user = User::find($userID)->toArray();
        //dd($user);
        $order = DB::table('orders')
                ->join('order_details', 'orders.id', '=','order_details.order_id')
                ->leftjoin('products','order_details.product_id','=','products.id')
                ->select('orders.*','order_details.price','order_details.sale_quantity',  'products.name as product_name')
                ->where('orders.id','=',$id)
                ->get();
        $status = Status::all();
        Mail::to($mail_order['email'])->send(new OrderMail($mail_order,$order,$status,$orderID));
        return redirect()->route('order.index')->with(['message'=>'Đã gửi 1 thông báo đến khách hàng!!']);

    }

    public function search(Request $request){
        $status = Status::all();
        $array_user = array();
        $array_deliverer = array();
        //----- tìm tên khách hàng ------// 
        if($request->user_name){
            $user_name = User::where('fullname','like','%'.$request->user_name.'%')
                        ->get()->toArray();
            foreach ($user_name as $key => $value) {
                $user_id = $user_name[$key]['id'];
                $order = Order::where('user_id',$user_id)->get();
                $array_user[] = $order;
            }
            foreach ($array_user as $key => $value) {
                foreach ($value->toArray() as $key1 => $value1) { 
                     $order_id[] = Order::find($value1['id']);
                }
            }
                 // dd($order_id);
                return view('admin.order.search', compact('order_id','status'));
        }
        //----- tìm tên nhân viên giao hàng ------// 
        if($request->deliverer_name){
            
            $deliverer_name = Deliverer::where('name','like','%'.$request->deliverer_name.'%')
                        ->get()->toArray();
            foreach ($deliverer_name as $key => $value) {
                $deliverer_id = $deliverer_name[$key]['id'];
                $order = Order::where('deliverer_id',$deliverer_id)->get();
                $array_deliverer[] = $order;
            }
            foreach ($array_deliverer as $key => $value) {
                foreach ($value->toArray() as $key1 => $value1) { 
                     $order_id[] = Order::find($value1['id']);
                }
            }
                
                return view('admin.order.search', compact('order_id','status'));
        }
       
        //----- tìm theo ngày ------// 
        if($request->date){
            //dd($request->abc);
            $order_id = Order::whereDate('created_at','=',$request->date)
                        ->get();
            return view('admin.order.search', compact('order_id','status'));
            //dd($order_id);
                        
        }
         //----- tìm theo tình trạng đơn hàng ------// 
        if($request->status_order){
           
             dd($request->status_order);
            $order_id = Order::where('status_id',$request->status_order)->get();
                   //dd($order_id);      
        return view('admin.order.search', compact('order_id','status'));
        }
    }
}
