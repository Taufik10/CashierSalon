<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"><!--<![endif]--><!-- BEGIN HEAD --><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="" name="description">
   <meta content="" name="author">
   <link href="/css/bootstrap.css" rel="stylesheet">
   <link href="/css/bootstrap-responsive.css" rel="stylesheet">
   <link href="/css/font-awesome.css" rel="stylesheet">
   <link href="/css/style.css" rel="stylesheet">
   <link href="/css/style-responsive.css" rel="stylesheet">
   <link href="/css/style-default.css" rel="stylesheet" id="style_color">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="/auth/login">
            <img class="center" alt="logo" src="/img/salon.png">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </a>
        <!-- END LOGO -->
    </div>
    <div class="login-wrap">
    	
        <div class="metro single-size red" style="background:#34495e">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>Login</span>
            </div>
        </div>
        <form method="POST">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        <div class="metro double-size green" style="background:#34495e">
                <div class="input-append lock-input">
                    <input class="" placeholder="Email" name="email" type="text">
                </div>
	        </div>
	        <div class="metro double-size yellow" style="background:#34495e">
                <div class="input-append lock-input">
                    <input class="" placeholder="Password" name="password" type="password">
                </div>
	        </div>
	        <div class="metro single-size terques login" style="background:#34495e">
                <button type="submit" class="btn login-btn">
                    Login
                    <i class=" icon-long-arrow-right"></i>
                </button>
	        </div>
        </form>
        <div class="metro double-size navy-blue ">
            <a href="https://www.facebook.com/jakmania80" class="social-link">
                <i class="icon-facebook-sign"></i>
                <span>My Facebook</span>
            </a>
        </div>
        <div class="metro double-size" style="background:#e74c3c">
            <a href="https://plus.google.com/u/0/103861567969196634767" class="social-link">
                <i class="icon-google-plus-sign"></i>
                <span>My Google+</span>
            </a>
        </div>
        <div class="metro double-size deep-red">
            <a href="https://www.instagram.com/taufik_noviyanto/?hl=en" class="social-link">
                <i class="icon-instagram"></i>
                <span>My Instagram</span>
            </a>
        </div>
        <div class="login-footer">
            <div class="remember-hint pull-left">
                <input id="" type="checkbox"> Remember Me
            </div>
            <div class="forgot-hint pull-right">
                <a id="forget-password" class="" href="javascript:;">Forgot Password?</a>
            </div>
        </div>
    </div>


</body><!-- END BODY --></html>