<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="shortcut icon" href="img/icon.png">
    <title>@yield('title')</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="{!! load_asset('/css/materialize.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{!! load_asset('/css/style.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{!! load_asset('/css/animate.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{!! load_asset('/css/mdp.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! load_asset('/css/sweetalert.css') !!}" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="navbar-fixed">

        @include('sections.header')

    </div>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 m12 l8">

                    @yield('content')

                </div>

                <div class="col s7 m4 offset-s6  hide-on-med-and-down right">

                    @include('sections.sidenav')

                </div>
            </div>

        </div>
    </div>

    <footer class="page-footer teal">

        @include('sections.footer')

    </footer>

    <!--  Scripts-->
    <script src="{!! load_asset('/js/jquery.min.js') !!}"></script>
    <script src="{!! load_asset('/js/index.js') !!}"></script>
    <script src="{!! load_asset('/js/wow.min.js') !!}"></script>
    <script src="{!! load_asset('/js/NewPassword.js') !!}"></script>
    <script type="text/javascript" src="{!! load_asset('/js/jquery-ui-1.11.1.js') !!}"></script>
    <script type="text/javascript" src="{!! load_asset('/js/sweetalert.min.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('select').material_select();
        $(".button-collapse").sideNav();
        $('.tooltipped').tooltip({delay: 50});
    });
    new WOW().init();
    </script>
</body>

</html>
