<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryID = Category::all();
        $listCategory = Category::orderBy('id','ASC')->paginate(5);
       
        return view('admin.category.list', compact('listCategory','categoryID'));
    }
    public function showCategory()
    {
        $listCategory = Category::all();
        return view('user.index', compact('listCategory'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
        $data = $request->except('_token');
        Category::create($data);
        return redirect()->route('category.index')->with(['message'=>'Đã tạo thành công !!']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $data = $request->except('_token', '_method');
        $category->update($data);
        return redirect()->route('category.index')->with(['message'=>'Đã sửa thành công!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::with('products')->find($id);
        
        $countProduct = count($category->products);
        if($countProduct == 0){
            $category->delete();
            return redirect()->route('category.index')->with(['message'=>'Đã xóa thành công!!']);
        }
        else{
            return redirect()->route('category.index')->with(['error'=>'Không thể xóa vì hãng này vẫn còn sản phẩm!!']);
        }
 
       
    }
    public function search(Request $request){
        $categoryID = Category::all();
        if($request->name){
            $category = Category::where('name','like','%'.$request->name.'%')
                        ->get();
        return view('admin.category.search', compact('category','categoryID'));
        }
        if($request->brand){
            //dd($request->brand);
            $category = Category::where('id',$request->brand)->get();
                        
        return view('admin.category.search', compact('category','categoryID'));
        }
    }
}
