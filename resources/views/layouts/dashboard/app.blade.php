<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE 2 | Blank Page</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{asset('dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

{{--    @if (app()->getLocale() == 'ar')--}}
        <link rel="stylesheet" href="{{ asset('dashboard/css/font-awesome-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/AdminLTE-rtl.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/rtl.css') }}">
    <link rel="stylesheet" href="{{asset('css/croppie.css')}}">

        <style>
            .lds-ring {
                display: inline-block;
                position: relative;
                width: 64px;
                height: 64px;
            }
            .lds-ring div {
                box-sizing: border-box;
                display: block;
                position: absolute;
                width: 51px;
                height: 51px;
                margin: 6px;
                border: 6px solid #9C0200;
                border-radius: 50%;
                animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
                border-color: #9C0200 transparent transparent transparent;
            }
            .lds-ring div:nth-child(1) {
                animation-delay: -0.45s;
            }
            .lds-ring div:nth-child(2) {
                animation-delay: -0.3s;
            }
            .lds-ring div:nth-child(3) {
                animation-delay: -0.15s;
            }
            @keyframes lds-ring {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }

            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
            .sidebar-menu .menu-open>a>.fa-angle-right, .sidebar-menu .menu-open>a>.pull-right-container>.fa-angle-right {
                -webkit-transform: rotate(-90deg);
                -ms-transform: rotate(-90deg);
                -o-transform: rotate(-90deg);
                transform: rotate(-90deg);
            }

            .sidebar-menu li>a>.fa-angle-right {
                position: absolute;
                top: 50%;
                left: 10px;
                margin-top: -8px;
            }
            .sidebar-menu li>a>.fa-angle-right, .sidebar-menu li>a>.pull-right-container>.fa-angle-right {
                width: auto;
                height: auto;
                padding: 0;
                margin-left: 10px;
                -webkit-transition: transform .5s ease;
                -o-transition: transform .5s ease;
                transition: transform .5s ease;
            }
             #my-image, #use {
                 display: none;
             }
            .croppie-container{
                overflow: hidden;
                height: auto;
                width: auto;
            }
            .overlay{
                position: fixed;
                width: 100%;
                height: 100%;
                left: 0;
                right: 0;
                z-index: 5;
                background-color: #6d6d6d59;
            }
            /*@media (max-width: 1200px) {*/
            /*    .croppie-container .cr-viewport, .croppie-container .cr-resizer{*/
            /*        left: 188px;*/
            /*    }*/

            /*}*/
            /*@media (max-width: 991px) {*/
            /*    .croppie-container .cr-viewport, .croppie-container .cr-resizer{*/
            /*        left: 0px;*/
            /*    }*/

            /*}*/
            /*@media (max-width: 550px) {*/
            /*    .croppie-container .cr-viewport, .croppie-container .cr-resizer{*/
            /*        left: 192px;*/
            /*    }*/

            /*}*/
            .showImage .glyphicon{
                padding: 5px;
                background: #CCC;
                border-radius: 50%;
                position: absolute;
                top: 9px;
                cursor: pointer;
            }
            .remove{
                right: 23px;
            }
            .edit{
                right: 50px;
            }
            .increment .remove{
                display: none;
            }


        </style>
    @yield('css')
{{--    @else--}}
{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">--}}
{{--        <link rel="stylesheet" href="{{ asset('dashboard/css/font-awesome.min.css') }}">--}}
{{--        <link rel="stylesheet" href="{{ asset('dashboard/css/AdminLTE.min.css') }}">--}}
{{--    @endif--}}

    <style>
        .mr-2{
            margin-right: 5px;
        }

    </style>
    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard/plugins/noty/noty.min.js') }}"></script>

    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck/all.css') }}">

    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini" style="position: relative">
<div class="overlay" style="display: none">
    <div class="loading" style="position: absolute;z-index: 5;display: block">
        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>
</div>
<div class="wrapper">

    <header class="main-header">

        {{--<!-- Logo -->--}}
        <a href="{{ asset('dashboard') }}/index2.html" class="logo">
            {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    {{--<!-- User Account: style can be found in dropdown.less -->--}}
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('dashboard/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">

                            <span class="hidden-xs">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu">

                            {{--<!-- User image -->--}}
                            <li class="user-header">
                                <img src="{{ asset('dashboard/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                    <small>Member since 2 days</small>
                                </p>
                            </li>

                            {{--<!-- Menu Footer-->--}}
                            <li class="user-footer">


                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">@lang('site.logout')</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    @include('layouts.dashboard._aside')

    @yield('content')

    @include('partials._session')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016
            <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

</div><!-- end of wrapper -->

{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{asset('dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
{{--icheck--}}
<script src="{{ asset('dashboard/plugins/icheck/icheck.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('dashboard/js/fastclick.js') }}"></script>

{{--<!-- AdminLTE App -->--}}
<script src="{{ asset('dashboard/js/adminlte.min.js') }}"></script>

{{--ckeditor standard--}}
<script src="{{ asset('dashboard/plugins/ckeditor/ckeditor.js') }}"></script>

<script src="{{asset('dashboard/js/custom/image_preview.js')}}"></script>
<script src="{{asset('dashboard/js/custom/order.js')}}"></script>
@yield('js')
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree();

        //icheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        //delete
        $('body').on("click",".delete",function (e) {
            e.preventDefault();

            var that = $(this);



            var n = new Noty({
                text: "@lang('site.confirm_delete')",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                        n.close();
                        console.log('code After delete')
                    }),

                    Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete

        // image preview
        $(".image").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(this.files[0]);
            }

        });
        $('.overlay').css({
            'width':($(window).width() ) + 'px',
            'height':($(window).width() ) + 'px'
        });
        $('.loading').css({
            "margin-right": (($(window).width() - 64)/2 + 'px'),
            "margin-top": (($(window).height() - 69)/2 + 'px')
        });
        $(window).resize(function () {
            $('.loading').css({
                "margin-right": (($(window).width() - 64)/2 + 'px'),
                "margin-top": (($(window).height() - 69)/2 + 'px')
            });
            $('.overlay').css({
                'width':($(window).width() ) + 'px',
                'height':($(window).height() ) + 'px'
            });
        });

        CKEDITOR.config.language =  "{{ app()->getLocale() }}";

    });//end of ready
</script>

@yield('cropImage')
</body>
</html>
