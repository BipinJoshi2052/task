
<h4 class="box-title">Edit Product</h4>
<form action="{{route('products.store')}}" method="post">
	@csrf
	<div class="row">					
		<div class="col-md-6 form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{(isset($room))?($room['name']):''}}">
		</div>				
	</div>
</form>