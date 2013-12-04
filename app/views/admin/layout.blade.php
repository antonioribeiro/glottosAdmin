<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Antonio Carlos Ribeiro - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets//templates/sb-admin/css/bootstrap.css') }}" rel="stylesheet">

    <link href="assets/templates/sb-admin/css/" rel="stylesheet">
    <link href="{{ asset('assets//templates/sb-admin/css/sb-admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets//templates/sb-admin/font-awesome/css/font-awesome.min.css') }}">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="{{ URL::route('admin.languages.index') }}">Antonio Carlos Ribeiro - Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->

        @include('admin._partials.mainMenu')
      </nav>

      <div id="page-wrapper">

			@yield('pageHeader')

			@include('admin._partials.messages')

			@yield('content')            

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="assets/templates/sb-admin/js/jquery-1.10.2.js"></script>
    <script src="assets/templates/sb-admin/js/bootstrap.js"></script>

  </body>
</html>

<!-- 	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

		<title>Admin - Antonio Carlos Ribeiro</title>

		<!-- Bootstrap core CSS 
		<link href="{{ asset('assets/layouts/admin/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/layouts/admin/css/jumbotron-narrow.css') }}" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy this line! 
		<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries 
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]
	</head>

	<body>

		<div class="container">
			<div class="header">
				<ul class="nav nav-pills pull-right">
					<li><a href="{{ URL::route('home') }}">acr.com</a></li>
					<li class="active"><a href="{{ URL::route('admin.languages.index') }}">Languages</a></li>
					<li><a href="{{ URL::route('admin.languages.index') }}">Translate</a></li>
				</ul>
				<h3 class="text-muted">ACR.com Admin</h3>
			</div>

			@include('admin._partials.messages')

			@yield('content')

			<div class="footer">
				<p>&copy; Antonio Carlos Ribeiro 2013</p>
			</div>

		</div> <!-- /container 

	</body>
</html> 










