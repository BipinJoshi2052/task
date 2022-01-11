<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>
       {{ config('app.name', 'Kotha Kharcha') }}
    </title>

	<link rel="stylesheet" href="{{asset('styles/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/additional.css')}}">
</head>

<body>
    <div id="single-wrapper">
        <form action="{{ route('login') }}" method="POST" class="frm-single">
            @csrf
            <div class="inside">
                <div class="title"><strong>Stock</strong>Management</div>
                <!-- /.title -->
                <div class="frm-title">Login</div>
                
                <!-- /.frm-title -->
                <div class="frm-input">
                    <input type="text" placeholder="Email" class="frm-inp"  name="email" value="{{ old('email') }}" required autofocus><i class="fa fa-user frm-ico"></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert" style="display: block!important;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- /.frm-input -->
                <div class="frm-input">
                    <input type="password" placeholder="Password" class="frm-inp"  name="password" required autocomplete="current-password" ><i class="fa fa-lock frm-ico"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert" style="display: block!important;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- /.frm-input -->
                <div class="clearfix margin-bottom-20">
                    <div class="float-left">
                        <div class="checkbox primary">
                            <input type="checkbox" id="rememberme" name="remember">
                            <label for="rememberme">Remember me</label>
                        </div>
                    </div>
                    <!-- /.float-left -->
                    <div class="float-right"><a href="{{ route('password.request') }}" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
                    <!-- /.float-right -->
                </div>
                <!-- /.clearfix -->
                <button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
                <div class="row small-spacing">
                    <div class="col-md-12">
                        <div class="txt-login-with txt-center">or login with</div>
                        <!-- /.txt-login-with -->
                    </div>
                    <!-- /.col-md-12 -->
                    <div class="col-md-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></button></div>
                    <!-- /.col-md-6 -->
                    <div class="col-md-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button></div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
                <a href="{{ route('register') }}" class="a-link">
                    <i class="fa fa-key"></i>New to Kotha Kharcha? Register.
                </a>
                <!-- /.footer -->
            </div>
            <!-- .inside -->
        </form>
        <!-- /.frm-single -->
    </div>
	<script src="{{asset('scripts/jquery.min.js')}}"></script>
	<script src="{{asset('scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('plugin/waves/waves.min.js')}}"></script>
</body>

</html>