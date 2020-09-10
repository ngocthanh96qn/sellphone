 @if(Session::has('error'))
   <div class="row">
   	<div class="col-lg-12 ">
   		<div class="alert alert-danger">
   			{{ Session::get('error') }}
   		</div>
   	</div>
   </div>
   @endif