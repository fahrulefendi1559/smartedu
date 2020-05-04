<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PPDS | File Manager</title>

    <link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <link href="{!! asset('assets/css/animate.css" rel="stylesheet') !!}">
    <link href="{!! asset('assets/css/style.css" rel="stylesheet') !!}">
    @stack('css')

</head>

<body>

<div id="wrapper">
    @include('layouts.menu')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Crud Ajax</span>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        @yield('content')
        <div class="footer">
            <div class="float-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Sekelik &copy; <?php echo date('Y');?>
            </div>
        </div>
    </div>
</div>


<!-- Mainly scripts -->
<script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets/js/inspinia.js') }}"></script>
<script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>
@stack('script')

</body>

</html>
