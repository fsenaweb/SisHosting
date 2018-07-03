<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{ config('app.name') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
    <style>
        .box {
            width: 98vw;
            height: 90vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-top: 5vh;
        }
    </style>
</head>

<body class="">
    <div class="container-fluid">
        <div class="box">
            <div class="col-md-5">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="{{ route('home') }}">
                            <img class="img" src="{{ asset('assets/images/user.jpg') }}" />
                        </a>
                    </div>
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
                    <h6 style="text-align: center">Sistema de Gerenciamento de Host - SisHosting</h6>
            </div>
        </div>
    </div>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
</body>

</html>