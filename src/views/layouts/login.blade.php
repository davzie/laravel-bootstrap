<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('css')
        <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('packages/davzie/laravel-bootstrap/css/login.css') }}">
    @show

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <title>@yield('title')</title>
</head>

<body class="login-form">

    <div class="container">

                {{ Form::open(array( 'url'=>$urlSegment.'/login' , 'method'=>'POST' , 'class'=>'form-signin' , 'role'=>'form' )) }}

                    <h1 class="form-signin-heading">Please Sign In</h1>

                    @include('laravel-bootstrap::partials.messaging')

                    {{ Form::text('email', Input::old('email') , array( 'placeholder'=>'Your Email Address' , 'class'=>'form-control' ) ) }}

                    {{ Form::password('password', array( 'placeholder'=>'Your Password' , 'class'=>'form-control' ) ) }}

                    {{ Form::submit('Sign In' , array( 'class'=>'btn btn-lg btn-primary btn-block' ) ) }}

                {{ Form::close() }}

                
    </div>

    @section('scripts')
        <script src="{{ asset('packages/davzie/laravel-bootstrap/js/jquery.js') }}"></script>
        <script src="{{ asset('packages/davzie/laravel-bootstrap/js/bootstrap.min.js') }}"></script>
    @show
</body>
</html>