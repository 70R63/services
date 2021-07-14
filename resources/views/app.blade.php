<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Laravel base -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- spruha -->
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<!-- Favicon -->
		<link rel="icon" href="{{ url('public/spruha/img/brand/favicon.ico') }}" type="image/x-icon"/>

		<!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Title -->
		<title>ULALAXPRESS - Plataforma de envios</title>

		<!-- Bootstrap css-->
		<link href="{{ url('public/spruha/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/ type="text/css">

		<!-- Icons css-->
		<link href="{{ url('public/spruha/plugins/web-fonts/icons.css') }}"  rel="stylesheet"/>
		<link href="{{ url('public/spruha/plugins/web-fonts/font-awesome/font-awesome.min.css') }}"  rel="stylesheet">
		<link href="{{ url('public/spruha/plugins/web-fonts/plugin.css') }}"  rel="stylesheet"/>

		<!-- Style css-->
		<link href="{{ url('public/spruha/css/style.css') }}"  rel="stylesheet">
		<link href="{{ url('public/spruha/css/skins.css') }}"  rel="stylesheet">
		<link href="{{ url('public/spruha/css/dark-style.css') }}"  rel="stylesheet">
		<link href="{{ url('public/spruha/css/colors/default.css') }}"  rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ url('public/spruha/css/colors/color.css') }}">

		<!-- Select2 css-->
		<link href="{{ url('public/spruha/plugins/select2/css/select2.min.css') }}"  rel="stylesheet">

		<!-- Mutipleselect css-->
		<link rel="stylesheet" href="{{ url('public/spruha/plugins/multipleselect/multiple-select.css') }}">

		<!-- Sidemenu css-->
		<link href="{{ url('public/spruha/css/sidemenu/sidemenu.css') }}"  rel="stylesheet">

	</head>


	<body class="main-body leftmenu main-sidebar-hide">
		<!-- Page -->
		<div class="page">
			<!-- Sidemenu -->
			<div class="main-sidebar main-sidebar-sticky side-menu">

				<div class="sidemenu-logo">
					<a class="main-logo" href="index.html">
						<img src="{{ url('public/spruha/img/brand/ulalaLogoBco-134x50.png') }}" class="header-brand-img desktop-logo" alt="logo">
						<img src="{{ url('public/spruha/img/brand/logoUlala-50x56.png') }}" class="header-brand-img icon-logo" alt="logo">
						<img src="{{ url('public/spruha/img/brand/ulalaBco.png') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="{{ url('public/spruha/img/brand/ulalaBco.png') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>

				<div class="main-sidebar-body">
					<ul class="nav">
						<li class="nav-header"><span class="nav-label">MENU</span></li>
						<li class="nav-item ">
							<a class="nav-link" href="{{ url('/inicio') }}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">DASHBOARD</span></a>
						</li>
						@include('menu/envio')
						@include('menu/facturacion') 
					</ul>
				</div>

			</div>
			<!-- End Sidemenu -->

			<!-- Main Header-->
			<div class="main-header side-header sticky">
				<div class="container-fluid">
					<div class="main-header-left">
						<a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
					</div>

					<div class="main-header-center">
						test
					</div>

					<div class="main-header-right">
						@include('perfil/index')
						<button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
						</button><!-- Navresponsive closed -->
					</div>
				</div>
			</div>
			<!--End  Main Header-->

			<!-- Mobile-header -->
			<div class="mobile-main-header">
				<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						@include('perfil/index')
						
					</div>
				</div>
			</div>
			<!-- End Mobile-header -->

			<!-- Main Content-->
			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
						</div>
						<!-- End Page Header -->
						
						@yield('content')
		
					</div>
				</div>
			</div>
			<!-- End Main Content-->

			<!-- Main Footer-->
			<div class="main-footer text-center">
				<div class="container">
					<div class="row row-sm">
						<div class="col-md-12">
							<span>Copyright © 2021 <a href="#">ULALAXPRESS</a>. Designed by <a href="#">TED</a> All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
			<!--End Footer-->
		</div>
		<!-- END Page -->


		<!-- Jquery js-->
		<script src="{{ url('public/spruha/plugins/jquery/jquery.min.js') }}"></script>

		<!-- Bootstrap js-->
		<script src="{{ url('public/spruha/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ url('public/spruha/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- Internal Chart.Bundle js-->
		<script src="{{ url('public/spruha/plugins/chart.js/Chart.bundle.min.js') }}"></script>

		<!-- Peity js-->
		<script src="{{ url('public/spruha/plugins/peity/jquery.peity.min.js') }}"></script>

		<!-- Select2 js-->
		<script src="{{ url('public/spruha/plugins/select2/js/select2.min.js') }}"></script>

		<!-- Perfect-scrollbar js -->
		<script src="{{ url('public/spruha/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

		<!-- Sidemenu js -->
		<script src="{{ url('public/spruha/plugins/sidemenu/sidemenu.js') }}"></script>

		<!-- Sidebar js -->
		<script src="{{ url('public/spruha/plugins/sidebar/sidebar.js') }}"></script>

		<!-- Internal Morris js -->
		<script src="{{ url('public/spruha/plugins/raphael/raphael.min.js') }}"></script>
		<script src="{{ url('public/spruha/plugins/morris.js/morris.min.js') }}"></script>

		<!-- Sticky js -->
		<script src="{{ url('public/spruha/js/sticky.js') }}"></script>
		
		<!-- Internal Jquery-steps js-->
		<script src="{{ url('public/spruha/plugins/jquery-steps/jquery.steps.min.js') }}"></script>

		<!-- Internal Accordion-Wizard-Form js-->
		<script src="{{ url('public/spruha/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>

		<!-- Internal Form-wizard js-->
		<script src="{{ url('public/spruha/js/form-wizard.js') }}"></script>

		<!-- Internal Dashboard js
		<script src="{{ url('public/spruha/js/index.js') }}"></script>
-->
		<!-- Sticky js -->
		<script src="{{ url('public/spruha/js/sticky.js') }}"></script>

		<!-- Custom js -->
		<script src="{{ url('public/spruha/js/custom.js') }}"></script>

		<!-- Internal Parsley js-->
		<script src="{{ url('public/spruha/plugins/parsleyjs/parsley.min.js') }}"></script>

		<!-- Internal Form-validation js-->
		<script src="{{ url('public/spruha/js/form-validation.js') }}"></script>

		
	</body>
</html>