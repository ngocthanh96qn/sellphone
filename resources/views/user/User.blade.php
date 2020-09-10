@extends('user.layout.master')
@section ('content')
<div class="container" style="margin-top: 100px; margin-bottom: 100px">
    <div style="margin-bottom: 70px">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="text-center" >Xin chào: <strong style="color:red">{{$user['fullname']}}</strong></h4>
                        <h5  >Email:&emsp; &emsp;&nbsp;&nbsp;  <strong style="color:#0B2F3A">{{$user['email']}}</strong></h5>
                        <h5  >Điện thoại:&nbsp; <strong style="color:#0B2F3A">{{$user['phone']}}</strong></h5>
                        <h5  >Đại chỉ:&nbsp;&emsp;&emsp; <strong style="color:#0B2F3A">{{$user['address']}}</strong></h5>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('user.editProfile') }}"><button class="btn" style="background-color: #0B2F3A; color: white">Chỉnh Sửa</button></a>
                    </div> 
                </div>   
            </div>
            <div class="col-md-6 text-center">
                <a href="{{ route('user.logout') }}"><button class="btn btn-default" style="background-color:#070719; color:#FFF; font-weight: bold"><i class="fa fa-sign-out" aria-hidden="true"></i>&ensp;Đăng xuất</button></a>
            </div>
       
        </div>
  
    </div>
    
    @if ($account==null)
    <div class="text-center"><h3 style="color: red">Hiện bạn chưa có đơn hàng nào!</h3></div>
    
    @else
    <div class="" style="margin-bottom: 50px">
        <h4>Quản lí đơn hàng của bạn</h4>
    </div>
     <div class="table-responsive">

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>ID Đơn Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Trạng Thái</th>   
                </tr>
            </thead>
            <tbody>
                
                 @foreach ($account as $key=>$order)
           <tr class="clickable warning dropdown-deliverable" data-for="#details_{{$key}}">
                    <td>{{$order['id']}}</td>
                    
                    <td>{{$order['created_at']}}</td>
                    
                    @if ($order['status_id']==1)
                    <td><span class="label label-info">{{$order['status_name']}}</span></td>
                    @elseif($order['status_id']==2)
                    <td><span class="label label-warning">{{$order['status_name']}}</span></td>
                    @elseif($order['status_id']==3)
                    <td><span class="label label-success">{{$order['status_name']}}</span></td>
                    @elseif($order['status_id']==4)
                    <td><span class="label label-danger">{{$order['status_name']}}</span></td>
                    @endif
                    
         </tr>    
                
                <tr style="padding:0">
                    <td style="padding:0"></td>
                    <td colspan=2 style="padding:0px;">
                        <div class="deliverable-infos" id="details_{{$key}}">
                            <table class="table table-condensed table-user-content" id="hidden_table_{{$key}}">
                                 <tbody>
                                    <tr>
                                        <td style="color: red; font-weight: bold" >Sản Phẩm</td>
                                        <td style="color: red; font-weight: bold" class="right-col">Giá</td>
                                    </tr>
                                        @foreach ($order['details'] as $value)
                                        <tr>
                                          <td ><strong>{{$value['sale_quantity']}}</strong> x <strong>{{$value['product_name']}}</strong></td>
                                          <td class="right-col"> {{number_format($value['price'])}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    <tr>
                                        <td  style="color: red; font-weight: bold">Tổng Giá:</td>
                                        <td class="right-col"  style="color: red; font-weight: bold">{{number_format($order['total_price'])}}</td>
                                    </tr>
                                    @if ($order['status_id']==1)
                                    <tr>
                                        <td></td> 
                                        <td class="right-col"><a href="{{route('user.orderUpdate',['id'=>$order['id'],'status'=>'1'])}}"><span class="label label-danger">Hủy Đơn</span></a></td> 
                                    </tr>
                                    @elseif($order['status_id']==4)
                                    <tr>
                                        <td></td> 
                                        <td class="right-col"><a href="{{route('user.orderUpdate',['id'=>$order['id'],'status'=>'4'])}}"><span class="label label-info">Đặt lại</span></a></td> 
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div >
                                <h5 style="color: red">Thông tin nhận hàng</h5>
                                <h5>Tên người nhận: &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; {{$order['name']}}</h5>
                                <h5>Số điện thoại người nhận:&emsp;{{$order['phone']}}</h5>
                                <h5>Địa chỉ nhận hàng: &emsp;&emsp;&emsp;&emsp; {{$order['address']}}</h5>
                                <h5>Ghi chú thêm: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; {{$order['note']}}</h5>
                            </div>
                        </div>
                    </td>
                    <td style="padding:0"></td>
                    <td style="padding:0"></td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
    @endif
   
</div>

@endsection