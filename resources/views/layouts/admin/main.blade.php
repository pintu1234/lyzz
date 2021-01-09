<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Lyzz Admin')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('admin/css/skins/_all-skins.min.css')}}">
    {{--simple MDE--}}
    <link rel="stylesheet" href="{{asset('admin/plugins/simplemde/simplemde.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    {{--Date time picker css--}}
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-datetime-picker.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('layouts.admin.include.navbar')

    @include('layouts.admin.include.sidebar')

    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="#">tahmid-ni7</a>.</strong> All rights
        reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('/')}}admin/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('/')}}admin/js/bootstrap.min.js"></script>
{{--Simple MDE--}}
<script src="{{asset('/')}}admin/plugins/simplemde/simplemde.min.js"></script>

{{--Date and time picker js--}}
<script src="{{asset('/')}}admin/js/moment.min.js"></script>
<script src="{{asset('/')}}admin/js/bootstrap-datetime-picker.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('/')}}admin/js/app.min.js"></script>
@yield('script')
</body>
</html>
