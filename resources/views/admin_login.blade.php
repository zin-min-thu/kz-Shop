<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin Login</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->

	<link rel="shortcut icon" href="{{URL::to('backend/img/favicon.ico')}}">
	<!-- end: Favicon -->

			<style type="text/css">
			body { background: url('backend/img/bg-login.jpg') !important; }
		</style>



</head>

<body>
	
	@include('admin.login')

	<!-- start: JavaScript-->

		<script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
	    <script src="{{asset('backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
		<script src="{{asset('backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
		<script src="{{asset('backend/js/modernizr.js')}}"></script>
		<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('backend/js/jquery.cookie.js')}}"></script>
		<script src="{{asset('backend/js/excanvas.js')}}"></script>
		<script src="{{asset('backend/js/jquery.uniform.min.js')}}"></script>
		<script src="{{asset('backend/js/custom.js')}}"></script>
	<!-- end: JavaScript-->

</body>
</html>
