@extends('admin.master.master')
		@section ('content')
    <div class="row">
      <div class="col-sm-12">
        <form action="{{route('search_product')}}"  method="GET" style="margin-bottom:30px " class="form-inline" role="form">
          @csrf
          <div class="form-group" style="margin-right:10px ">
             <input type="search" name="name" id="input" class="form-control"  placeholder="Tên sản phẩm...">
          </div>
          <div class="form-group" style="margin-right:10px ">
            <select name="brand" id="input" class="form-control" >
                <option >-- Hãng --</option>
                @foreach ($categoryID as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-default" style="margin-right:30px "><i class="fas fa-search"></i></button>

           <button type="button" class="btn btn-info" ><a style="color:white;" href="{{route('product.create')}}">Tạo Mới</a></button>
        </form>
       
      </div>
    </div>
    
	<div class="card card-info main">
    	<div class="card-header">
      		<h3 class="card-title">Danh Sách Sản Phẩm</h3>
        	<div class="card-tools">
          	<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        	</div>
        </div>
       
            <div class="card-body p-0" style="width: 98%; margin: 10px auto; border: 1px solid gray;">
             	<table class="table table-hover">
                <thead style="background: #DEE1E6;">
                  	<tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
      					    <th>Tên sản phẩm</th>
                    <th>Hãng</th>
      					    <th>Số lượng</th>
      					    <th>Giá bán</th>	
        						<th>Ngày tạo</th>
        					
        						<th >Hành động</th>
				
                  	</tr>
                </thead>
                <tbody>
				@foreach($products as $key => $rel)
                 	<tr>
                   	<td>{{$key+1}}</td>
                   	<td><img src="{{asset($rel->image)}}" width="70px" height="50px">
						        </td>
        						<td>{{$rel->name}}</td>
                    <td>{{$rel->category->name}}</td>
        						<td>{{$rel->quantity}}</td>
        						<td>{{number_format($rel->price)}}</td>
        						<td>{{$rel->created_at}}</td>
        						
                    	<td >
                      		<div class="btn-group btn-group-sm">
                      			
                      			<a style="margin-right: 5px" href="{{route('product.show',$rel->id)}}" class="btn btn-info" title="chi tiết"><i class="fas fa-eye"></i></a>
                        		<a style="margin-right: 5px" href="{{route('product.edit',$rel->id)}}" class="btn btn-secondary" title="sửa" onclick = 'return confirm("Bạn có chắc chắn muốn sửa sản phẩm: {{ $rel->id }} không?")'><i class="far fa-edit"></i></a>
                            <a style="margin-right: 5px" href="{{route('product.destroy', $rel->id)}}" class="btn btn-danger" onclick="event.preventDefault();
                                                       window.confirm('Bạn có chắc là bạn muốn xoá sản phẩm: ' + '{{ $rel->id }}' + ' không?') ? document.getElementById('delete-product-{{ $rel->id }}').submit() : false;"><i class="fas fa-trash"></i></a>
                        <form  action="{{route('product.destroy', $rel->id)}}" method="POST" id="delete-product-{{ $rel->id }}" style="display: none;">
                      @method('DELETE')
                      @csrf
                  </form>
                          </div>
                    	</td>
                  	</tr>
                  @endforeach
              </tbody>
             
              </table>
              

            </div>
            
            <!-- /.card-body -->
</div>
@endsection