<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/zeiss/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Mar 2020 06:40:50 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="keyword" content="Task">
	<meta name="description" content="Task">
	<meta name="author" content="Task">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title') - {{ config('app.name', 'Task') }}</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{asset('styles/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/additional.css')}}">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="{{asset('fonts/material-design/css/materialdesignicons.css')}}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{asset('plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{asset('plugin/waves/waves.min.css')}}">

	<!-- Sweet Alert -->
	{{-- <link rel="stylesheet" href="{{asset('plugin/sweet-alert/sweetalert.css')}}"> --}}
	
	<!-- Percent Circle -->
	<link rel="stylesheet" href="{{asset('plugin/percircle/css/percircle.css')}}">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="{{asset('plugin/chart/chartist/chartist.min.css')}}">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="{{asset('plugin/fullcalendar/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugin/fullcalendar/fullcalendar.print.css')}}" media='print'>
    
	<!-- Toastr -->
	<link rel="stylesheet" href="{{asset('plugin/toastr/toastr.css')}}">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('plugin/select2/css/select2.min.css')}}">
    
	<!-- Data Tables -->
	<link rel="stylesheet" href="{{asset('plugin/datatables/media/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css')}}">

	
	<!-- Remodal -->
	<link rel="stylesheet" href="{{asset('plugin/modal/remodal/remodal.css')}}">
	<link rel="stylesheet" href="{{asset('plugin/modal/remodal/remodal-default-theme.css')}}">
	<!-- Jquery UI -->
	<link rel="stylesheet" href="{{asset('plugin/jquery-ui/jquery-ui.min.css')}}">

</head>

<body>
    <div class="main-menu">
        <header class="header">
            <a href="#" class="logo">Task</a>
            <button type="button" class="button-close fa fa-times js__menu_close"></button>
        </header>
        <!-- /.header -->
        <div class="content">

            <div class="navigation">
                <ul class="menu js__accordion">
                    <li class="{{ (request()->segment(1) == 'dashboard') ? 'current active' : '' }}">
                        <a class="waves-effect" href="{{route('dashboard')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
                    </li>	
                    <li class="{{ (request()->segment(1) == 'products') ? 'current active' : '' }}">
                        <a class="waves-effect" href="{{route('products.index')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Stocks</span></a>
                    </li>
                    <li class="{{ (request()->segment(1) == 'docs') ? 'current active' : '' }}">
                        <a class="waves-effect" href="{{route('docs')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Docs</span></a>
                    </li>
                    <li>
                        <a class="waves-effect" href="{{route('web.logout')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Logout</span></a>
                    </li>
                </ul>
                <!-- /.menu js__accordion -->
            </div>
            <!-- /.navigation -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.main-menu -->

    <div class="fixed-navbar">
        <div class="float-left">
            <button type="button" class="menu-mobile-button fas fa-bars js__menu_mobile"></button>
            <h1 class="page-title">Home</h1>
            <!-- /.page-title -->
        </div>
    </div>
    <!-- /.fixed-navbar -->

    <div id="notification-popup" class="notice-popup js__toggle" data-space="50">
        <h2 class="popup-title">
            Your Notifications
        @if(auth()->user()->unreadNotifications->count()==0)
                                                    ( 0 )
                                                @else
                                                    ( {{auth()->user()->unreadNotifications->count()}} )
                                                @endif
                                                </h2>
        <!-- /.popup-title -->
        <div class="content">
            <ul class="notice-list">
                @if(auth()->user()->unreadNotifications->count() > 0)
                    @foreach(auth()->user()->notifications as $notification)
                        @if($notification->type == 'App\Notifications\FriendReuquestNotification')
                            <li>
                                <a href="">
                                    <span class="avatar"><img src="{{asset('images/'.$notification->data['data']['image'])}}" alt="{{$notification->data['data']['name']}}"></span>
                                    <span class="name">Friend Request</span>
                                    <span class="desc">{{$notification->data['data']['name']}} has reuquested to be a friend.”</span>
                                    <span class="time">{{$notification->created_at->diffForHumans();}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach                
                @endif
            </ul>
            <!-- /.notice-list -->
            <a href="#" class="notice-read-more">See more notifications <i class="fa fa-angle-down"></i></a>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#notification-popup -->



    <div id="app">
        <main>
        <div id="wrapper">
            <div class="main-content">
                
                    @yield('content')

                    <!-- <footer class="footer">
                    <ul class="list-inline">
                        <li>2016 © NinjaAdmin.</li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </footer> -->
            </div>
            <!-- /.main-content -->
        </div>
        </main>
    </div>


	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{asset('scripts/jquery.min.js')}}"></script>
	<script src="{{asset('scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('plugin/nprogress/nprogress.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{asset('plugin/waves/waves.min.js')}}"></script>
	<!-- Full Screen Plugin -->
	<script src="{{asset('plugin/fullscreen/jquery.fullscreen-min.js')}}"></script>


	<!-- Select2 -->
    <script src="{{asset('plugin/select2/js/select2.min.js')}}"></script>

	<!-- chart.js Chart -->
	<script src="{{asset('plugin/chart/chartjs/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('scripts/chart.chartjs.init.min.js')}}"></script>

	<!-- FullCalendar -->
	<script src="{{asset('plugin/moment/moment.js')}}"></script>
	<script src="{{asset('plugin/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{asset('scripts/fullcalendar.init.js')}}"></script>

	<!-- Sparkline Chart -->
	<script src="{{asset('plugin/chart/sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('scripts/chart.sparkline.init.min.js')}}"></script>

	<script src="{{asset('scripts/main.min.js')}}"></script>
    <script src="{{asset('scripts/mycommon.js')}}"></script>

	<!-- Toastr -->
	<script src="{{asset('plugin/toastr/toastr.min.js')}}"></script>
    
	<!-- Data Tables -->
	<script src="{{asset('plugin/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('plugin/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js')}}"></script>
	<script src="{{asset('scripts/datatables.demo.min.js')}}"></script>


	<!-- Jquery UI -->
	<script src="{{asset('plugin/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('plugin/jquery-ui/jquery.ui.touch-punch.min.js')}}"></script>


    
	<script src="{{asset('js/custom.js')}}"></script>
    
    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif
    @if (session('error'))
        @if(is_array(session('error')))
            @foreach(session('error') as $error)
                <script>
                toastr.error(' {{ $error }}');
                </script>
            @endforeach
        @else    
            <script>
                toastr.error(' {{session('error') }}');
            </script>
        @endif
    @endif

    <script>
    $(document).ready( function () {
        $('.datatable').DataTable({
            pageLength: 100,
            dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
            buttons: [
            {
               extend: 'copy',
               className: 'btn-sm btn-info',
               title: 'Gamers',
               header: false,
               footer: true,
               exportOptions: {
                  // columns: ':visible'
               }
            },
            {
               extend: 'csv',
               className: 'btn-sm btn-success',
               title: 'Gamers',
               header: false,
               footer: true,
               exportOptions: {
                  // columns: ':visible'
               }
            },
            {
               extend: 'excel',
               className: 'btn-sm btn-warning',
               title: 'Gamers',
               header: false,
               footer: true,
               exportOptions: {
                  // columns: ':visible',
               }
            },
            {
               extend: 'pdf',
               className: 'btn-sm btn-primary',
               title: 'Gamers',
               pageSize: 'A2',
               header: false,
               footer: true,
               exportOptions: {
                  // columns: ':visible'
               }
            },
            {
               extend: 'print',
               className: 'btn-sm btn-success',
               title: 'Gamers',
               // orientation:'landscape',
               pageSize: 'A2',
               header: true,
               footer: false,
               orientation: 'landscape',
               exportOptions: {
                  // columns: ':visible',
                  stripHtml: false
               }
            }
         ],
        });
    } );
    
</script>
        
    <script>
        $('.select2').select2();
        jQuery(document).ready( function () {
            var link = $('.delete-form').attr("href");
                // var link = $('.delete-form');
            $('.delete-form').on('click',function(e) {
                e.preventDefault();
                Swal.fire({
                title: 'Are you sure you want to delete this?',
                showDenyButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                // confirmButtonText: 'Save',
                denyButtonText: `Delete`,
                }).then((result) => {
                    if (result.isConfirmed) {
                    } 
                    else if (result.isDenied) {
                        window.location = link;
                    }
                });
            });
        });
        
    </script>
</body>

</html>