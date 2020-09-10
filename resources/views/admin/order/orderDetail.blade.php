@extends('admin.master.master')
		@section ('content')
		<!-- list category -->
	@include('errors.message')
	<div class="card card-info main"  >
    <div class="card-header">
      <h3 class="card-title">CHI TIẾT ĐƠN HÀNG</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
        </div>
            <div class="card-body p-0">
              <div class="user_info" >
                  <table class="table table-bordered table-hover" style="border-collapse: separate;width: 800px; border:1px solid red">
                    <thead>
                      <tr>
                        <th style="width: 300px">Thông tin khách hàng</th>
                        <th style="width: 500px"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Người đặt hàng</td>
                        <td>{{ $orderID->name }}</td>
                      </tr>
                      <tr>
                        <td>Ngày đặt hàng</td>
                        <td>{{date("d-m-Y", strtotime("$orderID->created_at"))}}</td>
                        
                      </tr>
                      <tr>
                        <td>Số điện thoại</td>
                        <td>{{ $orderID->phone }}</td>
                      </tr>
                      <tr>
                        <td>Địa chỉ</td>
                        <td>{{ $orderID->address }}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>{{ $orderID->email }}</td>
                      </tr>
                      <tr>
                        <td>Ghi chú</td>
                        <td>{{ $orderID->note }}</td>
                      </tr>
                    </tbody>
                  </table>         
                              
              </div>
              
              <div class="col-md-12">
                    <div class="col-md-6"  >
                        <div class="product_info">
                <h2>Thông tin sản phẩm</h2>
                <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" >
                  
                            <thead>
                            <tr >
                                <th >STT</th>
                                <th >Tên sản phẩm</th>
                                <th >Số lượng</th>
                                <th >Giá tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                           @foreach($order as $key => $value)
                                <tr>
                                  <td>{{ $key+1 }}</td>
                                   <td>{{$value->product_name}}</td>

                                   <td>{{$value->sale_quantity}}</td>
                                    
                                    <td>{{number_format($value->price)}}</td> 
                                </tr>
                          @endforeach
                         
                            <tr>
                                <td colspan="3"><b>Tổng tiền</b></td>
                                <td colspan="1"><b class="text-red"> {{number_format($orderID->total_price)}}VNĐ</b></td>
                            </tr>
                          

                            </tbody>
                            
                        </table>
                      </div>
                    </div>
                    <div class="col-md-6" style="float: right; " >
                        <div class="form-inline">
                          <form action="{{route('order.update', $orderID->id)}}" method="POST">
                          @method('PUT')
                          @csrf
                            <label style="float: left;">Trạng thái đơn hàng: </label>
                            <select name="status_id" class="form-control input-inline" style="width: 200px">
                              <option value="">{{$orderID->status->status}}</option>
                              <option value="">-- Lựa Chọn --</option>
                              @foreach ($status as $value)
                              <option value="{{$value->id}}">{{$value->status}}</option>
                              @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary">Xử lý</button>

                      
                            </form>
                        </div>
                    </div>
                    
                </div>
              

            </div>
            
            
</div>


@endsection