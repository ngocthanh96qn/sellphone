@extends('admin.master.master')
	@section ('content')
  @include('errors.message')
  @include('errors.error')
    <div class="row">
      <div class="col-sm-12">
        <form action=""  method="GET" style="margin-bottom:30px " class="form-inline" role="form">
          @csrf
           <button type="button" class="btn btn-info" ><a style="color:white;" href="{{route('userAuth.create')}}">Tạo Mới</a></button>
        </form>
       
      </div>
    </div>
  
		<div class="card card-info main">
    <div class="card-header">
      <h3 class="card-title">Danh Sách</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
        </div>
            <div class="card-body p-0" style="width: 98%; margin: 10px auto; border: 1px solid gray;">
              <table class="table">
                <thead style="background: #DEE1E6;">
                  <tr>
                    <th>STT</th>
          					<th>Tên</th>
          					<th>Email</th>
                    <th>Điện thoại</th>
                    <th>Hành động</th>
					  
                  </tr>
                </thead>
                <tbody>
				        @foreach($user as $key => $rel)
                <tr>
                	<td>{{++$key}}</td>
        					<td>{{$rel->fullname}}</td>
        					<td>{{$rel->email}}</td>
                  <td>{{$rel->phone}}</td>
        				
                    <td >
                      		<div class="btn-group btn-group-sm">
                      			<a style="margin-right: 5px" href="{{route('userAuth.show',$rel->id)}}" class="btn btn-info" title="Chi tiết"><i class="fas fa-eye"></i></a>
                        		<a style="margin-right: 5px" href="{{route('userAuth.edit',$rel->id)}}" class="btn btn-secondary" title="Sửa"><i class="far fa-edit"></i></a>
                            <a style="margin-right: 5px" title="Xóa" href="{{route('userAuth.destroy', $rel->id)}}" class="btn btn-danger" onclick="event.preventDefault();
                                                       window.confirm('Bạn có chắc là bạn muốn xoá user: ' + '{{ $rel->id }}' + ' không?') ? document.getElementById('delete-user-{{ $rel->id }}').submit() : false;"><i class="fas fa-trash"></i></a>
                        <form  action="{{route('userAuth.destroy', $rel->id)}}" method="POST" id="delete-user-{{ $rel->id }}" style="display: none;">
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