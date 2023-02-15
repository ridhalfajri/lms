<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/style.min.css') }}">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css') }}">

</head>

<body>

    <div id="single-wrapper">
        <form action="{{ route('login') }}" class="frm-single" method="POST">
            @csrf
            <div class="inside">
                <div class="title"><strong>Ninja</strong>Admin</div>
                <!-- /.title -->
                <div class="frm-title">{{ __('Login') }}</div>
                <!-- /.frm-title -->
                <div class="frm-input">
                    <input type="email" placeholder="{{ __('Email Address') }}"
                        class="frm-inp  @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}"required autocomplete="email" autofocus><i
                        class="fa fa-user frm-ico"></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- /.frm-input -->
                <div class="frm-input">
                    <input type="password" placeholder="{{ __('Password') }}" name="password" id="password"
                        class="frm-inp @error('password') is-invalid @enderror" required
                        autocomplete="current-password"><i class="fa fa-lock frm-ico"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- /.frm-input -->
                <div class="clearfix margin-bottom-20">
                    <div class="pull-left">
                        <div class="checkbox primary">
                            <input type="checkbox" id="remember" name="remember"
                                {{ old('remember') ? 'checked' : '' }}><label
                                for="remember">{{ __('Remember Me') }}</label>
                        </div>
                        <!-- /.checkbox -->
                    </div>
                    <!-- /.pull-left -->
                    @if (Route::has('password.request'))
                        <div class="pull-right"><a href="{{ route('password.request') }}" class="a-link"><i
                                    class="fa fa-unlock-alt"></i>{{ __('Forgot Your Password?') }}</a></div>
                    @endif

                    <!-- /.pull-right -->
                </div>
                <!-- /.clearfix -->
                <button type="submit" class="frm-submit">{{ __('Login') }}<i
                        class="fa fa-arrow-circle-right"></i></button>

                <!-- /.row -->
                <a href="{{ route('register') }}" class="a-link"><i class="fa fa-key"></i>New to NinjaAdmin?
                    Register.</a>
                <div class="frm-footer">NinjaAdmin © 2016.</div>
                <!-- /.footer -->
            </div>
            <!-- .inside -->
        </form>
        <!-- /.frm-single -->
    </div>
    <!--/#single-wrapper -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="assets/script/html5shiv.min.js"></script>
  <script src="assets/script/respond.min.js"></script>
 <![endif]-->
    <!--
 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('assets/plugin/waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/scripts/main.min.js') }}"></script>
</body>

</html>
