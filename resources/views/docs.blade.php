@extends('layouts.app')

@section('title')
    Friends
@endsection

@section('content')

@include('includes.message')
		<div class="row small-spacing ">
			{{-- <div class="col-lg-4 col-md-6"> --}}
				<div class="box-content" style="width: 100%;">
					
					<div class="row">
						<div class="col-xl-12 col-12">
							<div id="accordion-1" class="js__ui_accordion margin-top-20">
								<h3 class="accordion-title">Login</h3>
								<div class="accordion-content">
									<p>Url : https://spices-task.joshibipin.com.np/api/login</p>
									<p>Params : </p>
									<ul>
										<li>email : admin@gmail.com</li>
										<li>password : password</li>
									</ul>
								</div>
								<h3 class="accordion-title">Logout</h3>
								<div class="accordion-content">
									<p>Url : https://spices-task.joshibipin.com.np/api/logout</p>
									<p>Authorization : </p>
									<ul>
										<li>Type : Bearer</li>
										<li>Token : 34|KOyRAiFLDG8jLDUu8XpIhr3yj69D10lPde6X7CA0</li>
									</ul>
								</div>
								<h3 class="accordion-title">Products</h3>
								<div class="accordion-content">
									<p>Url : https://spices-task.joshibipin.com.np/api/products</p>
									<p>Authorization : </p>
									<ul>
										<li>Type : Bearer</li>
										<li>Token : 34|KOyRAiFLDG8jLDUu8XpIhr3yj69D10lPde6X7CA0</li>
									</ul>
								</div>
								<h3 class="accordion-title">Product Create</h3>
								<div class="accordion-content">
									<p>Url : https://spices-task.joshibipin.com.np/api/products/create</p>
									<p>form-data : </p>
									<ul>
										<li>name : Heater</li>
										<li>unit : pieces</li>
										<li>stock : 2</li>
									</ul>
									<p>Authorization : </p>
									<ul>
										<li>Type : Bearer</li>
										<li>Token : 34|KOyRAiFLDG8jLDUu8XpIhr3yj69D10lPde6X7CA0</li>
									</ul>
								</div>
								<h3 class="accordion-title">Product Edit</h3>
								<div class="accordion-content">
									<p>Url : https://spices-task.joshibipin.com.np/api/products/update</p>
									<p>form-data : </p>
									<ul>
										<li>id : 15</li>
										<li>name : Heater</li>
										<li>unit : pieces</li>
										<li>stock : 2</li>
									</ul>
									<p>Authorization : </p>
									<ul>
										<li>Type : Bearer</li>
										<li>Token : 34|KOyRAiFLDG8jLDUu8XpIhr3yj69D10lPde6X7CA0</li>
									</ul>
								</div>
								<h3 class="accordion-title">Product Destroy</h3>
								<div class="accordion-content">
									<p>Url : https://spices-task.joshibipin.com.np/api/products/destroy</p>
									<p>form-data : </p>
									<ul>
										<li>id : 15</li>
									</ul>
									<p>Authorization : </p>
									<ul>
										<li>Type : Bearer</li>
										<li>Token : 34|KOyRAiFLDG8jLDUu8XpIhr3yj69D10lPde6X7CA0</li>
									</ul>
								</div>
								<h3 class="accordion-title">Stock Update</h3>
								<div class="accordion-content">
									<p>Url : https://spices-task.joshibipin.com.np/api/products</p>
									<p>form-data : </p>
									<ul>
										<li>id : 8</li>
										<li>stock : 18</li>
									</ul>
									<p>Authorization : </p>
									<ul>
										<li>Type : Bearer</li>
										<li>Token : 34|KOyRAiFLDG8jLDUu8XpIhr3yj69D10lPde6X7CA0</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				{{-- </div> --}}
			</div>
		</div>

		@endsection