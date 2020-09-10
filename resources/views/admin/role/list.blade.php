@extends('admin.master.master')
		@section ('content')
    @include('errors.message')
  @include('errors.error')
		
	<div class="card card-info" style="width: 600px; float: left; margin-right: 30px">
    <div class="card-header">
      <h3 class="card-title">DANH SÁCH PHÂN QUYỀN</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
        </div>
            <div class="card-body p-0" style="width: 98%; margin: 10px auto; border: 1px solid gray;">
              <table class="table">
                <thead style="background: #DEE1E6;">
                  <tr>
                    <th>STT</th>
        					  <th>Tên phân quyền</th>
        					  <th>Số người phân quyền</th>
        					  <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($listRole as$key => $rel)
                <tr>
                  <td>{{$listRole->firstItem() + $key}}</td>
        					<td>{{$rel->name}}</td>
        					<td>{{count($rel->users)}}</td>
					
                    <td >
                      <div class="btn-group btn-group-sm">
                        <a style="margin-right: 5px" href="{{route('role.edit',$rel->id)}}" class="btn btn-info" onclick = 'return confirm("Bạn có chắc chắn muốn sửa quyền: {{ $rel->name }} không?" )' title="Sửa"><i class="far fa-edit"></i></a>
                        <a style="margin-right: 5px" href="{{route('role.destroy', $rel->id)}}" title="Xóa" class="btn btn-danger"  onclick="event.preventDefault();
                                                       window.confirm('Bạn có chắc là bạn muốn xoá hãng: ' + '{{ $rel->name }}' + ' không?') ? document.getElementById('delete-role-{{ $rel->name }}').submit() : false;" ><i class="fas fa-trash"></i></a>
                        <form  action="{{route('role.destroy', $rel->id)}}" method="POST" id="delete-role-{{ $rel->name }}" style="display: none;">
                      @method('DELETE')
                      @csrf
                  </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
             
              </table>
              <div class="clearfix">{{$listRole->links()}}</div>

            </div>
  </div>          
              <!-- create -->
          <div class="card card-secondary" style="width: 400px;">
            <div class="card-header">
              <h3 class="card-title">THÊM QUYỀN</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <form  action="{{route('role.store')}}" method="POST" role="form">
				@csrf
				<div class="form-group">
					<label for="">Tên phân quyền:</label>
					<input type="text" name="name" class="form-control" id="" placeholder="Input field">
					@if( $errors->has('name'))
            			<p style ="color: red;">{{$errors->first('name')}}</p>
        			@endif
					
				</div>
				<button type="submit" class="btn btn-primary">THÊM MỚI</button>
			</form>
              
            </div>
            <!-- /.card-body -->
          </div>


@endsection