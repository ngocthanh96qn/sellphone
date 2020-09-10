	@extends('admin.master.master')
		@section ('content')
		
<div class="card card-info category" >
    <div class="card-header">
      <h3 class="card-title">THÊM HÃNG ĐIỆN THOẠI</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
  </div>
             
     <div class="card-body category-2" >
        <form  action="{{route('category.store')}}" method="POST" role="form">
        @csrf
        <div class="form-group">
          <label for="">Tên hãng:</label>
          <input type="text" name="name" value="{{old('name') ? old('name') : ''}}" class="form-control" id="" placeholder="Input field">
          @if( $errors->has('name'))
                  <p style ="color: red;">{{$errors->first('name')}}</p>
              @endif
          
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
      </form>
              
            </div>
  </div>
			<div id="new-category"></div>
			 <script  type="text/javascript">
          //(document).ready(function() : wait page load xong roi thuc hien event
          $(document).ready(function(){
            $('button').on('click',function(e){
               e.preventDefault(); // ngan chan load qua page khac
               $.ajax({
                url: '/api/cate',
                type: 'POST',
                data: {
                  'name' : $("input[name=name]").val()
                 
                },
                success: function(response) {
                  console.log('Submission was successful.');
                  console.log(response); 

                  var html = '<table>'+
                                '<thead>' +
                                    '<tr>'+
                                      '<td>Name</td>'+
                                    
                                    '</tr>'+
                                  '</thead>'+
                                  '<tbody>'+
                                    '<tr>'+
                                      '<td>'+response.category.name+'</td>'+
                                   
                                    '</tr>'+
                                  '</tbody>'+

                                '</table>';
                  $('#new-category').html(html);

                },
                error: function (error) {
                  console.log('An error occured.');
                  console.log(error);
                },

              });
            });
            
          });
        </script>
	@endsection	