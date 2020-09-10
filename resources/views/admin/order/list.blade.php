@extends('admin.master.master')
		@section ('content')
		<!-- list category -->
	@include('errors.message')
  @include('errors.error')
    <div class="row">
      <div class="col-sm-12">
        <form action="{{route('search_order')}}"  method="GET" style="margin-bottom:30px " class="form-inline" role="form">
          @csrf
          <div class="form-group" style="margin-right:10px ">
             <input type="search" name="user_name" id="input" class="form-control"  placeholder="Tên khách hàng...">
          </div>
          <div class="form-group" style="margin-right:10px ">
             <input type="search" name="deliverer_name" id="input" class="form-control"  placeholder="Tên nhân viên giao hàng...">
          </div>
          <div class="form-group" style="margin-right:10px ">
            <select name="status_order" id="input" class="form-control" >
              <option >-- Tình trạng đơn hàng --</option>
              @foreach($status as $rel)
                <option value="{{$rel->id}}">{{$rel->status}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group" style="margin-right:10px ">
            <input type="date" name="date" id="input" class="form-control"  placeholder="ngày tháng năm...">
          </div>
          <button type="submit" class="btn btn-default" style="margin-right:30px "><i class="fas fa-search"></i></button>

           
        </form>
       
      </div>
    </div>
	<div class="card card-info main" >
    <div class="card-header">
      <h3 class="card-title">DANH SÁCH ĐƠN HÀNG</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
        </div>
            <div class="card-body p-0" style="width: 98%; margin: 10px auto; border: 1px solid gray;">
              <table class="table table-hover">
                <thead style="background: #DEE1E6;">
                  <tr>
                    <th>STT</th>
                    <th>Khách hàng</th>
                    <th >Địa chỉ nhận hàng</th>
                    <th>Người giao hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Số tiền</th>
                    <th>Tình trạng đặt hàng</th>

                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
				        @foreach($orderInfo as $key => $rel)

                 <tr>
                   <td>{{$orderInfo->firstItem() + $key }}</td>
					         <td>{{$rel->name}}</td>
                   <td>{{$rel->address}}</td>
                   <td>{{$rel->deliverer->name}}</td>
                   
                   <td>{{date("d-m-Y", strtotime("$rel->created_at"))}}</td>
                   <td>{{number_format($rel->total_price)}}</td>
                   @if ($rel->status_id ==1)
                    <td><label style="font-size: 14px;text-align: center;width: 100px;background: #c9f; border-radius: 5px;">{{$rel->status->status}}</label></td>
                  @elseif($rel->status_id ==2)
                    <td><label style="font-size: 14px;text-align: center;width: 120px;background: #0fcf; border-radius: 5px">{{$rel->status->status}}</label></td>
                  @elseif($rel->status_id ==3)
                    <td><label style="font-size: 14px;text-align: center;width: 100px;background: #ff0f; border-radius: 5px; ">{{$rel->status->status}}</label></td>
                  @elseif($rel->status_id ==4)
                    <td><label style="font-size: 14px;color: white ;text-align: center;width: 100px;background: red; border-radius: 5px; ">{{$rel->status->status}}</label></td>
                  @endif

                    <td >
                      <div class="btn-group btn-group-sm">
                        <a href="{{route('order.show', $rel->id)}}" class="btn btn-info" title="Chi tiết đơn hàng" style="margin-right: 5px"><i class="fas fa-eye"></i></a>

                        <a href="{{route('sendmail',$rel->id)}}" class="btn btn-secondary" title="Gửi thông báo giao hàng" onclick = 'return confirm("Bạn có chắc chắn muốn gửi thông báo đơn hàng đến khách hàng không?" )' style="margin-right: 5px"><i class="fas fa-paper-plane"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
             
              </table>
              <div class="clearfix">{{$orderInfo->links()}}</div>

            </div>
            
            <!-- /.card-body -->
</div>


@endsection