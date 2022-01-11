@extends('layouts.app')

@section('title')
{{isset($product)?'Edit':'Create'}} Stocks
@endsection

@section('content')


<div class="row small-spacing">
	<div class="col-xl-12 col-12">
		<div class="box-content card white">
			<h4 class="box-title">{{isset($product)?'Edit':'Create'}} Stock</h4>

			<div class="card-content">
				<form action="{{route('products.store')}}" method="post">
					@csrf
					<input type="hidden" class="form-control" name="id" value="{{(isset($product))?($product['id']):''}}">

					<div class="row">					
						<div class="col-md-6 form-group">
							<label for="name">Name</label>
							<input type="text" required class="form-control" name="name" id="name" placeholder="Name" value="{{(isset($product))?($product['name']):''}}">
						</div>				
						<div class="col-md-6 form-group">
							<label for="unit">Unit</label>
							<select class="form-control" name="unit" id="unit">
								<option {{(!isset($product))?'selected':''}}>Nothing selected</option>
								<option  {{(isset($product) && $product['unit'] == 'pieces')?'selected':''}} value="pieces"> Pieces</option>
								<option  {{(isset($product) && $product['unit'] == 'kg')?'selected':''}} value="kg"> Kg</option>
							</select>					
						</div>
						<div class="col-md-6 form-group">
							<label for="stock">Stock</label>
							<input type="number" required class="form-control" name="stock" id="stock" placeholder="stock"  value="{{(isset($product))?($product['stock']):''}}">
						</div>		
						<div class="col-md-12 form-group">
							<button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>				
						</div>

						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

		@endsection