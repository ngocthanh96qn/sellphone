
<h3>Cảm ơn bạn đã mua hàng!</h3>
<h4>Thông tin đơn hàng của bạn:</h4>
<strong>Tên:</strong> {{$mail_order['name']}} <br>
<strong>Số điện thoại:</strong> {{$mail_order['phone']}} <br>
<strong>Địa chỉ:</strong> {{$mail_order['address']}} <br>
<strong>Ngày đặt hàng:</strong> {{$mail_order['address']}} <br>
<strong>Trạng thái đơn hàng:</strong> {{$orderID->status->status}} <br>

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
                                  <td>{{ ++$key }}</td>
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

