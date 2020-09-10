  @if(Session::has('message'))
   <div class="row">
   	<div class="col-lg-12 ">
   		<div class="alert alert-success">


   			{{ Session::get('message') }}
   		</div>
   	</div>
   </div>
   @endif