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
    <style type="text/css">
    body{
        background: #fff;
    }
    </style>
</head>

<body>
    <div class="navbar-fixed">

        @include('sections.header')

    </div>

    <div class="container">
        <div class="section">

            <div class="row" align="center">

                <img src="{{ load_asset('/images/404.png') }}">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>

    <script type="text/javascript">
    new WOW().init();
    </script>
</body>

</html>
