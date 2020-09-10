<h3>Cảm ơn bạn đã mua hàng!</h3>
<h4>Đơn hàng của bạn:</h4>
<strong>Tên:</strong> {{$name}} <br>
<strong>Số điện thoại:</strong> {{$phone}} <br>
<strong>Địa chỉ:</strong> {{$address}} <br>
<strong>ID Đơn Hàng : </strong> {{$order_id}} <br>
<strong>Chú thích thêm : </strong> {{$note}} <br>
<table style="border-collapse: collapse;border: 1px solid gray;">
	<thead >
		<tr style="background-color: #D10024; color:white">
			<th style="border: 1px solid gray">Tên sản Phẩm</th>
			<th style="border: 1px solid gray">Số lượng</th>
			<th style="border: 1px solid gray">Giá</th>   
		</tr>
	</thead>
	<tbody >
@foreach ($product as $value)
	<tr  >
			<td style="border: 1px solid gray">{{$value['name']}}</td> 
			<td style="border: 1px solid gray">{{$value['qty']}}</td> 
			<td style="border: 1px solid gray">{{$value['price']}}</td> 
		</tr>
@endforeach
		
	</tbody>
</table>
<br>
<strong>Tổng đơn hàng:</strong> {{$total}} VND
