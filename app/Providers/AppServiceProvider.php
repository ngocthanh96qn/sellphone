<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Product;
use DB;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        //Share biến category cho tất cả các wiew
        View::share('category', Category::all()->toArray());
        ////////////////////////

         //Lây product_id san phảm bán nhiều nhất
        $hotProduct = DB::table('order_details')
        ->select('product_id', DB::raw('SUM(sale_quantity) as total_quantity'))
        ->groupBy('product_id')
        ->orderBy('total_quantity', 'DESC')
                ->take(5) //lấy 5 sản phẩm                
                ->get()->toArray();

            if(empty($hotProduct)){ //kiem tra neu mảng rỗng
                 $listHotProduct=array();
            }
            else {
                  //////Lây list san phẩm bán nhìu nhất ($hotProduct là mang cac oj)
                foreach ($hotProduct as $key => $value) {
        $product = Product::find($value->product_id)->toArray(); //$product là mảng sp 
        $listHotProduct[]=[
            'id'=> $product['id'],
            'category_name'=>Category::find($product['category_id'])->toArray()['name'],
            'product_name'=>$product['name'],
            'price'=>$product['price'],
            'image'=>$product['image']
        ];
    }   
            }
      
    View::share('listHotProduct', $listHotProduct);
    //////////////////////////
}   
}

