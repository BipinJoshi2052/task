@extends('layouts.app')

@section('title')
    Friends
@endsection

@section('content')

@include('includes.message')
		<div class="row small-spacing">
			<div class="col-lg-4 col-md-6">
				<div class="box-content">
					<div class="row">
						<div class="col-6">
							<h4 class="box-title text-info">Total Expenses</h4>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-remodal-target="remodal" class="btn btn-primary waves-effect waves-light">Add Expense</a>
							{{-- <button type="button" data-remodal-target="remodal" class="btn btn-primary waves-effect waves-light">Lauch Modal</button>					 --}}
						</div>
						
					</div>
					<div class="content widget-stat">
						<div id="traffic-sparkline-chart-1" class="left-content margin-top-15"></div>
						<!-- /#traffic-sparkline-chart-1 -->
						<div class="right-content">
							<h2 class="counter text-info">Rs. {{$room_expenses_total}}</h2>
							<!-- /.counter -->
							<p class="text text-info">Some text here</p>
							<!-- /.text -->
						</div>
						<!-- .right-content -->
					</div>
					<!-- /.content widget-stat -->
				</div>
			</div>
		</div>
		<div class="row small-spacing">
			<div class="col-12">
				<div class="box-content">
					<h4 class="box-title">Expenses List</h4>

					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Item</th>
								<th>Amount</th>
								<th>Created By</th>
								<th>Self Paid</th>
								<th>Divide</th>
							</tr>
						</thead>
						<tbody>
							@if(isset($room_expenses) && !empty($room_expenses))
								@foreach($room_expenses as $a => $list)
									<tr>
										<td>{{$list['item']['title']}}</td>
										<td>{{$list['amount']}}</td>
										<td>{{$list['created_by']['name']}}</td>
										<td>{{($list['self_paid'] == 1)?'Yes':'No'}}</td>
										<td>{{($list['divide'] == 1)?'Yes':'No'}}</td>
									</tr>
								@endforeach
							@else
								No Results Found.
							@endif
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
		</div>
			
		<div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
			<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
			<div class="remodal-content">
				<h2 id="modal1Title">Room Expense</h2>
				{{-- <form action="" method="post"> --}}
					{{-- @csrf --}}
					<div class="row">	
						<div class="col-md-6 form-group">
							<label for="item_id">Item</label>
							<select class="form-control" name="item_id" id="item_id">
								<option selected disabled>Nothing selected</option>
								@if(isset($items) && !empty($items))
									@foreach($items as $a => $list)
										<option value="{{$list['id']}}">{{$list['title']}}</option>
									@endforeach
								@else
									<option selected disabled> No Items Found</option>
								@endif
							</select>					
						</div>				
						<div class="col-md-6 form-group">
							<label for="amount">Amount</label>
							<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="">
						</div>	
						<div class="col-md-12 form-group">
							<label for="self_paid">Self Paid</label>
							<select class="form-control" name="self_paid" id="self_paid" data-roomid="{{$room_id}}">
								<option selected disabled>Nothing selected</option>
								<option value="1"> Yes</option>
								<option value="0">No</option>
							</select>					
						</div>	
						<div class="col-md-12 form-group pay_members_div hidden">
							<div class="pay_members_row">
								
							</div>	
							<div>
								<button type="button" class="btn btn-danger waves-effect waves-light add-pay-members" data-roomid="{{$room_id}}"><i class="fa fa-plus"></i></button>		
							</div>
						</div>	
						<div class="col-md-12 form-group">
							<label for="item_id">Divide Amount</label>
							<select class="form-control" name="item_id" id="item_id">
								<option selected disabled>Nothing selected</option>
								<option value="1"> Yes</option>
								<option value="0">No</option>
							</select>					
						</div>	
					</div>
				{{-- </form> --}}
			</div>
			<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
			<button data-remodal-action="confirm" class="remodal-confirm">OK</button>
		</div>

		@endsection