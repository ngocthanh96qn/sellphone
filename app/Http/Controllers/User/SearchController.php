<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\User\Controller;
use DB;
class SearchController extends Controller
{
//  function getProductId(Request $request)
//  {

//   if(isset($request->product_search)){
//     $data = DB::table('products')
//     ->select('id')
//     ->where('name','LIKE',"%{$request->product_search}%")
//     ->get();
//     return redirect(route('user.product',$data[0]->id));
//   }
//   else {return redirect(route('user.home'));}
// }

function search(Request $request)
{
 if($request->get('query'))
 {
  $query = $request->get('query');
  $data = DB::table('products')
  ->where('name', 'LIKE', "%{$query}%")
  ->get();
  $output = '<ul class="dropdown-menu" style="display:block; position:absolute; width:295px;">';
  foreach($data as $row)
  {
   $output .= '
   <li class = "result"><a href="/user/product/'.$row->id.'">'.$row->name.'</a></li>
   ';
 }
 $output .= '</ul>';
 echo $output;
}
}
}
