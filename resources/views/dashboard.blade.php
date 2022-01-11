@extends('layouts.app')

@section('title')
    Dashboard
@endsection
@php
    use Illuminate\Support\Facades\Auth;    
@endphp

@section('content')
            <div class="row small-spacing">
                <div class="col-md-6 col-xl-3 col-12">
                    <div class="box-content">
                        <h4 class="box-title">Welcome {{Auth::user()->name}}</h4>
                        <h6>Email : {{Auth::user()->email}}</h6>
                        <h6>Role : {{ucwords(Auth::user()->role)}}</h6>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-12">
                    <div class="box-content">
                        <h4 class="box-title text-orange">Total Products</h4>
                        <!-- /.dropdown js__dropdown -->
                        <div class="content widget-stat">
                            <div class="right-content">
                                <h2 class="counter text-danger">{{(isset($result) && $result >0)?$result:'0'}}</h2>
                            </div>
                            <!-- .right-content -->
                        </div>
                        <!-- /.content widget-stat -->
                    </div>
                    <!-- /.box-content -->
                </div>
            </div>
@endsection
