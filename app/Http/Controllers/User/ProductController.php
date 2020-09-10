<?php

namespace App\Http\Controllers\User;
use App\Cart;
use App\Category;
use App\Product;
use App\Order;
use App\Guest;
use App\User;
use App\Review;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function getAddToCart(Request $request, $id) {
      $product = Product::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($product, $product->id);   
      Session::put('cart',$cart); 

        return redirect()->route('user.cart'); //chuyen đến route cart
      }
      public function getCart() {
        if (!Session::has('cart')) {
          return redirect()->route('user.home');
        }
        $cart = Session::get('cart');

        return view('user.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        //chuyen đến trang thanh toán
      }
      public function deleteProduct($id) {

        $storedCart = Session::get('cart');
        $cart = new Cart($storedCart);
        $cart->delete($id);
        Session::put('cart',$cart);
        
        return redirect()->route('user.cart');

      }
      public function updateCart($id, $action){

        //tinh so luong san pham ton kho theo id va loại cac đơn da huy
        $qtySold=0;
        $listOrder_detailOfProductId = DB::table('order_details') ->where('product_id',$id)->get() ;
        foreach ($listOrder_detailOfProductId as $key => $value) {
          //lay id order truy xuat bang order xem status
         if((Order::find($value->order_id)->status_id)!=4){ //khong huy
            $qtySold+=$value->sale_quantity;  //tính số hàng đã bán
          }   
        }


         $qtyStore = Product::find($id)->quantity; //so luong trong kho 
         $qtyAvailable=$qtyStore-$qtySold; //so luong co san

         $storedCart = Session::get('cart');
         $cart = new Cart($storedCart);
         $cart->update($id,$action,$qtyAvailable);
         Session::put('cart',$cart);

         return redirect()->route('user.cart');
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $qtySold=0;
      $listOrder_detailOfProductId = DB::table('order_details') ->where('product_id',$id)->get() ;

      foreach ($listOrder_detailOfProductId as $key => $value) {
          //lay id order truy xuat bang order xem status
         if((Order::find($value->order_id)->status_id)!=4){ //khong huy
            $qtySold+=$value->sale_quantity;  //tính số hàng đã bán
          }   
        }

         $qtyStore = Product::find($id)->quantity; //so luong trong kho 
         $qtyAvailable=$qtyStore-$qtySold; //so luong co san

         $itemProduct = Product::find($id)->toArray();
         //list review of product
         $listReviewOfProduct = DB::table('reviews')->where('product_id',$id)->get();
          //dd($listReviewOfProduct->toArray());
         //chay for dr lay name nguoi review
         if($listReviewOfProduct->toArray()==null){
          $convertReviewOfProduct=null;
        }else {
          foreach ($listReviewOfProduct as $key => $value) {
            if($value->guest_id==null) {
             $convertReviewOfProduct[$key]['name'] = User::find($value->user_id)->fullname;  
           }else{
             $convertReviewOfProduct[$key]['name'] = Guest::find($value->guest_id)->name;
           }
           $convertReviewOfProduct[$key]['valueStar'] = $value->value;
           $convertReviewOfProduct[$key]['content'] = $value->content;
           $convertReviewOfProduct[$key]['created_at'] = $value->created_at;

         }
         

         $avg=DB::table('reviews')->select('product_id',DB::raw('AVG(value) as avg'))->groupBy('product_id')->where('product_id','=',$id)->get();
         $listValue=DB::table('reviews')->select('product_id','value')->where('product_id','=',$id)->get();
         $avg = round($avg[0]->avg,0);

       // $listReview = Review::where('product_id', $id)->groupBy('value')->select(\DB::raw('value, count(value) as number'))->get();
       // dd($listReview->toArray());
         
         $slvalue = ['1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'total'=>0];

         foreach ($listValue as $key => $value) {

           switch ($value->value) {
             case '1':
             $slvalue['1'] ++;
             break;
             case '2':
             $slvalue['2'] ++;
             break;
             case '3':
             $slvalue['3'] ++;
             break;
             case '4':
             $slvalue['4'] ++;
             break;
             case '5':
             $slvalue['5'] ++;
             break;
             default:
                     # code...
             break;
           }
           $slvalue['total'] = $key+1;
         }
       }
       
       $relateProduct=Category::find(Product::find($id)->category_id)->products->toArray();
       //////////////////Lây ảnh hien thị
       $image = Image::Where('product_id',$id)->get();
       
       //////////////

       return view('user.product',compact('itemProduct','qtyAvailable','convertReviewOfProduct','relateProduct','avg','slvalue','image'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
  }
