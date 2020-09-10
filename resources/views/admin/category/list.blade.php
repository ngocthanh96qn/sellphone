@extends('admin.master.master')
		@section ('content')
		<!-- list category -->
	
  @include('errors.message')
  @include('errors.error')
  <div class="row">
      <div class="col-sm-12">
        <form action="{{route('search_category')}}"  method="GET" style="margin-bottom:30px " class="form-inline" role="form">
          @csrf
          <div class="form-group" style="margin-right:10px ">
             <input type="search" name="name" id="input" class="form-control"  placeholder="Tên hãng sản xuất...">
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

           <button type="button" class="btn btn-info" ><a style="color:white;" href="{{route('category.create')}}">Tạo Mới</a></button>
        </form>
       
      </div>
    </div>

	<div class="card card-info main" >
    <div class="card-header">
      <h3 class="card-title">DANH SÁCH HÃNG ĐIỆN THOẠI</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
  </div>
            <div class="card-body p-0 " style="width: 98%; margin: 10px auto; border: 1px solid gray;">
             
              <table class="table table-hover">
                <thead style="background: #DEE1E6;">
                  <tr>
                      <th>STT</th>
                      
                     <th>Tên hãng</th>
                     <th>Tổng số sản phẩm</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  
                @foreach($listCategory as $key => $value)
                 <tr>
                   <td>{{$listCategory->firstItem() + $key}}</td>
                  
                   <td>{{$value->name}}</td>
                   <td>{{count($value->products)}}</td>
                    <td >
                      <div class="btn-group btn-group-sm">
                        <a style="margin-right: 5px" href="{{route('category.edit',$value->id)}}" class="btn btn-info" onclick = 'return confirm("Bạn có chắc chắn muốn sửa hãng: {{ $value->name }} không?" )' title="Sửa"><i class="far fa-edit"></i></a>
                        
                        <a style="margin-right: 5px" href="{{route('category.destroy', $value->id)}}" title="Xóa" class="btn btn-danger" onclick="event.preventDefault();
                                                       window.confirm('Bạn có chắc là bạn muốn xoá hãng: ' + '{{ $value->name }}' + ' không?') ? document.getElementById('delete-category-{{ $value->name }}').submit() : false;" ><i class="fas fa-trash"></i></a>
                        <form  action="{{route('category.destroy', $value->id)}}" method="POST" id="delete-category-{{ $value->name }}" style="display: none;">
                      @method('DELETE')
                      @csrf
                  </form>
                        
                      </div>
                    </td>
                  </tr>

                  @endforeach
              </tbody>
              </table>
              <div class="clearfix" style="float:right;">{{$listCategory->links()}}</div>

            </div>
          
</div>

@endsection