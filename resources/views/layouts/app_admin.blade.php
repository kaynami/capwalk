<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Singkong Butas - @yield('title')</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('lumino/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('lumino/css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('lumino/css/styles.css') }}" rel="stylesheet">
	
    <!--Custom Font-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    @yield('stylesheets')
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Singkong</span>Butas</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	@yield('content')
	
	<script src="{{ asset('lumino/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('lumino/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('lumino/js/chart.min.js') }}"></script>
	<script src="{{ asset('lumino/js/chart-data.js') }}"></script>
	<script src="{{ asset('lumino/js/easypiechart.js') }}"></script>
	<script src="{{ asset('lumino/js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('lumino/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('lumino/js/custom.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
	</script>
	@yield('scripts')
</body>
</html>