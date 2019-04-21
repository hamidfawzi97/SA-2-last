<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Asnanco</title>
    <meta name="description" content="Asnanco">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('scss/style.css')}}">

    <link href='{{asset("/css/font-OpenSans.css")}}' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('/css/font-RaleWay900.css')}}">


    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
            @if(!Session::has('username'))
                <div class="login-logo">
                    <h1 style="color: white; font-family: 'Raleway';">ASNANCO</h1>
                    <br/>
                    @if($message = Session::get('failed'))
                    <div class="alert alert-danger">
                        <p style="color: black;">{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="login-form">
                    <form method="post" action="{{action('LoginController@checkLogin')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" placeholder="User Name" required="" style="text-align:right;">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" style="text-align:right;">
                        </div>

                        <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="Log in"/>
                    </form>
                </div>
            @else
                @include('httpAuth')
            @endif
            </div>
        </div>
    </div>


    <script src="{{asset('js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>


</body>
</html>

