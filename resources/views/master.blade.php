<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,
	initial-scale=1">
	<title>Asnanco</title>
	
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
    
    <script src="{{asset('/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('/js/lib/data-table/datatables-init.js')}}"></script>

    <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{asset('/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/font-RaleWay900.css')}}">
    
    <style type="text/css">
        input[type="date"]{
            line-height: 1.5 !important;
        }
    </style>

</head>
<body>
@if (Session::has('username'))
    <div class="container">
    	@include('header')
    	<br/><br/><br/>
    	@yield('content')
    </div>
@else
    <div class="container">
        @include('httpAuth')
    </div>
@endif
</body>
</html>