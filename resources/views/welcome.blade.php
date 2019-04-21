<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Asnanco</title>
        <script src="{{asset('/js/jquery.min.js')}}"></script>

        <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet">
    
        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="favicon.ico">
        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('/css/font-RaleWay100-600.css')}}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @include('header')
            
             <div class="content">
                <div class="title m-b-md">
                    <!-- Asnanco -->
                    <!-- <img src="images/logo.jpeg"> -->
                    <img src="images/logo1.png">
                </div>

                <div class="links">
                    @if(session('role') == 1 || session('role') == 2 || session('role') == 3 || session('role') == 7)
                        <a href="{{url('Patients')}}" style="font-size: 18px;">قسم المرضى</a>
                    @endif

                    @if(session('role') == 1)
                        <a href="{{url('Purchases')}}" style="font-size: 18px;">المشتريات</a>
                    @elseif (session('role') == 2 || session('role') == 4)
                        <a href="{{url('Purchases/create')}}" style="font-size: 18px;">المشتريات</a>
                    @endif


                    @if(session('role') == 1)
                        <a href="{{url('RepairDevices')}}" style="font-size: 18px;">صيانة الاجهزه</a>
                    @elseif (session('role') == 2 || session('role') == 5)
                        <a href="{{url('RepairDevices/create')}}" style="font-size: 18px;">صيانة الاجهزه</a>
                    @endif
                    
                    
                    @if(session('role') == 1)
                        <a href="{{url('Salary')}}" style="font-size: 18px;">المرتبات</a>
                    @endif

                    @if(session('role') == 1 || session('role') == 2 || session('role') == 6)
                        <a href="{{url('Lab')}}" style="font-size: 18px;">المعامل</a>
                    @endif

                    @if(session('role') == 1)
                        <a href="{{url('Financial')}}" style="font-size: 18px;">البيان مالى</a>
                    @endif

                    @if(session('role') == 1)
                        <a href="{{url('Admin')}}" style="font-size: 18px;">وحده التحكم</a>
                    @endif
                </div>
                <br><br><br>
                 @if($message = Session::get('success'))
                <div class="container">
                    <div class="alert alert-success" style="text-align:right;">
                        <p>{{$message}}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
