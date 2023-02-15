<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
    <link rel="stylesheet" href="assets/styles/style.min.css">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

    <div id="single-wrapper">
        <form action="{{ route('register') }}" method="POST" class="frm-single">
            @csrf
            <div class="inside">
                <div class="title"><strong>Ninja</strong>Admin</div>
                <!-- /.title -->
                <div class="frm-title">{{ __('Register') }}</div>
                <!-- /.frm-title -->
                <div class="frm-input"><input type="email" name="email" id="email"
                        placeholder="{{ __('Email Address') }}"
                        class="frm-inp @error('email') is-invalid @enderror"value="{{ old('email') }}" required
                        autofocus autocomplete="email"><i class="fa fa-envelope frm-ico"></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- /.frm-input -->
                <div class="frm-input">
                    <input id="name" type="text" placeholder="{{ __('Name') }}"
                        class="frm-inp @error('name') is-invalid @enderror"name="name" value="{{ old('name') }}"
                        required autocomplete="name"><i class="fa fa-user frm-ico"></i>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- /.frm-input -->
                <div class="frm-input"><input id="password" type="password" placeholder="{{ __('Password') }}"
                        class="frm-inp @error('password') is-invalid @enderror"name="password" required
                        autocomplete="new-password"><i class="fa fa-lock frm-ico"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="frm-input"><input id="password-confirm" type="password"
                        placeholder="{{ __('Confirm Password') }}"
                        class="frm-inp @error('password') is-invalid @enderror"name="password_confirmation" required
                        autocomplete="new-password"><i class="fa fa-lock frm-ico"></i>
                </div>
                <!-- /.frm-input -->
                <!-- /.clearfix -->
                <button type="submit" class="frm-submit">{{ __('Register') }}<i
                        class="fa fa-arrow-circle-right"></i></button>
                <!-- /.row -->
                <a href="{{ route('login') }}" class="a-link"><i class="fa fa-sign-in"></i>Already have account?
                    Login.</a>
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
    <script src="assets/scripts/jquery.min.js"></script>
    <script src="assets/scripts/modernizr.min.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugin/nprogress/nprogress.js"></script>
    <script src="assets/plugin/waves/waves.min.js"></script>

    <script src="assets/scripts/main.min.js"></script>
</body>

</html>
