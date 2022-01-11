@extends('layouts.app')

@section('title')
    Stocks
@endsection

@section('content')


<div class="row small-spacing">
			<div class="col-xl-12 col-12">
				<div class="box-content card white">
					<div class="row">
						<div class="col-6"><h4 class="box-title">Stocks List</h4></div>
						
						<div class="col-6 text-right">
							<a href="{{route('products.create')}}" class="btn btn-primary margin-bottom-10 waves-effect waves-light addProduct">Add Stock</a>
						</div>
					</div>
						<!-- /.box-title -->
					<div class="card-content">
					@if(isset($result) && !empty($result))
					<table class="table datatable" style="font-size:14px">
                        <thead>
                            <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    {{-- <th>Slug</th> --}}
                                    {{-- <th>Unit</th> --}}
                                    <th>Stock</th>
                                    <th>Actions</th>
                            </tr>
                        </thead>
                         <tbody>
                   @php
                   $count = 1;
                   @endphp
					@foreach($result as $a => $num)
                  <tr>
                    <td><b>{{$count++}}</b></th>
					<td>{{ucwords($num['name'])}}</td>
					{{-- <td>{{ucwords($num['slug'])}}</td> --}}
					{{-- <td>{{ucwords($num['unit'])}}</td> --}}
					<td>{{ucwords($num['stock'])}}</td>
                    <td class="display-inline-block"> 
                         <a href="{{route('products.edit',$num['id'])}}" class="btn btn-success padding-5">
                            <i class="fa fa-edit font-13"></i>
                        </a>
                         <a href="{{route('product.destroy',$num['id'])}}" class="btn btn-danger delete-form padding-5">
                            <i class="fa fa-trash font-13"></i>
                        </a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
                    </table>
				@else
					No Results Found.
				@endif
					</div>
				</div>
			</div>
			
		
		</div>		
		@endsection