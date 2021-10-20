<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Laravel base -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- spruha -->
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<!-- Favicon -->
		<link rel="icon" href="{{ url('spruha/img/brand/favicon.ico') }}" type="image/x-icon"/>

		<!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Title -->
		<title>{{ config('app.name', 'Laravel') }} - Plataforma de envios</title>

		<!-- Bootstrap css-->
		<link href="{{ url('spruha/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/ type="text/css">

		<!-- Icons css-->
		<link href="{{ url('spruha/plugins/web-fonts/icons.css') }}"  rel="stylesheet"/>
		<link href="{{ url('spruha/plugins/web-fonts/font-awesome/font-awesome.min.css') }}"  rel="stylesheet">
		<link href="{{ url('spruha/plugins/web-fonts/plugin.css') }}"  rel="stylesheet"/>

		<!-- Style css-->
		<link href="{{ url('spruha/css/style.css') }}"  rel="stylesheet">
		<link href="{{ url('spruha/css/skins.css') }}"  rel="stylesheet">
		<link href="{{ url('spruha/css/dark-style.css') }}"  rel="stylesheet">
		<link href="{{ url('spruha/css/colors/default.css') }}"  rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ url('spruha/css/colors/color.css') }}">

		<!-- Select2 css-->
		<link href="{{ url('spruha/plugins/select2/css/select2.min.css') }}"  rel="stylesheet">

		<!-- Mutipleselect css-->
		<link rel="stylesheet" href="{{ url('spruha/plugins/multipleselect/multiple-select.css') }}">

		<!-- Sidemenu css-->
		<link href="{{ url('spruha/css/sidemenu/sidemenu.css') }}"  rel="stylesheet">

		<!-- Internal DataTables css-->
		<link href="{{ url('spruha/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ url('spruha/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ url('spruha/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet" />


		@yield('css_rol_page')

	</head>


	<body class="main-body leftmenu main-sidebar-hide">
		<!-- Page -->
		<div class="page">
			<!-- Sidemenu -->
			<div class="main-sidebar main-sidebar-sticky side-menu">

				<div class="sidemenu-logo">
					<a class="main-logo" href="index.html">
						<img src="{{ url('spruha/img/brand/ulalaLogoBco-134x50.png') }}" class="header-brand-img desktop-logo" alt="logo">
						<img src="{{ url('spruha/img/brand/logoUlala-50x56.png') }}" class="header-brand-img icon-logo" alt="logo">
						<img src="{{ url('spruha/img/brand/ulalaBco.png') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="{{ url('spruha/img/brand/ulalaBco.png') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>

				<div class="main-sidebar-body">
					<ul class="nav">
						<li class="nav-header"><span class="nav-label">MENU</span></li>
						<li class="nav-item ">
							<a class="nav-link" href="{{ url('/inicio') }}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">DASHBOARD</span></a>
						</li>
						@canany(['isAdmin','isSysAdmin'])
							@include('menu.configuracion')						
						<!-- @include('menu.facturacion') -->
							@include('menu.cliente')							
							@include('menu.roles')					
						@endcanany
						@canany(['isAdmin','isSysAdmin','isCliente'])
							@include('menu.usuario')
						@endcanany
						@include('menu.envio')
						 
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
						@include('perfil.index')
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
						@include('perfil.index')
						
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
							<div></div>
							<div class="d-flex">
									@include('mensaje.error')
									@include('mensaje.danger')
									@include('mensaje.exitoso')
							</div>							
						</div>
						
						<!-- End Page Header -->
						@yield('content')
					</div>
				</div>
			</div>
			<!-- End Main Content-->

			<!-- Main Footer-->
			<div class="main-footer text-center" >
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
		<!-- Terminos y Condiciones Modal -->
		@include('envios.modals.cotizacion')
		<!-- End Basic modal -->


		<!-- Jquery js-->
		<script src="{{ url('spruha/plugins/jquery/jquery.min.js') }}"></script>

		<!-- Bootstrap js-->
		<script src="{{ url('spruha/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- Internal Chart.Bundle js-->
		<script src="{{ url('spruha/plugins/chart.js/Chart.bundle.min.js') }}"></script>

		<!-- Peity js-->
		<script src="{{ url('spruha/plugins/peity/jquery.peity.min.js') }}"></script>

		<!-- Perfect-scrollbar js -->
		<script src="{{ url('spruha/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

		<!-- Sidemenu js -->
		<script src="{{ url('spruha/plugins/sidemenu/sidemenu.js') }}"></script>

		<!-- Sidebar js -->
		<script src="{{ url('spruha/plugins/sidebar/sidebar.js') }}"></script>

		<!-- Internal HandleCounter js -->
		<script src="{{ url('spruha/js/handleCounter.js') }}"></script>

		<!-- Select2 js-->
		<script src="{{ url('spruha/plugins/select2/js/select2.min.js') }}"></script>

		<!-- Internal Morris js -->
		<script src="{{ url('spruha/plugins/raphael/raphael.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/morris.js/morris.min.js') }}"></script>

		<!-- Sticky js -->
		<script src="{{ url('spruha/js/sticky.js') }}"></script>
		
		<!-- Internal Jquery-steps js-->
		<script src="{{ url('spruha/plugins/jquery-steps/jquery.steps.min.js') }}"></script>

		<!-- Internal Accordion-Wizard-Form js-->
		<script src="{{ url('spruha/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>

		<!-- Internal Form-wizard js-->
		<script src="{{ url('spruha/js/form-wizard.js') }}"></script>

		<!-- Internal Dashboard js
		<script src="{{ url('spruha/js/index.js') }}"></script>
-->
		<!-- Custom js -->
		<script src="{{ url('spruha/js/custom.js') }}"></script>

		<!-- Internal Parsley js-->
		<script src="{{ url('spruha/plugins/parsleyjs/parsley.min.js') }}"></script>

		<!-- Internal Form-validation js-->
		<script src="{{ url('spruha/js/form-validation.js') }}"></script>
		
		<!-- Internal Data Table js -->
		<script src="{{ url('spruha/plugins/datatable/jquery.dataTables.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/dataTables.responsive.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/fileexport/dataTables.buttons.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/fileexport/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/fileexport/jszip.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/fileexport/pdfmake.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/fileexport/vfs_fonts.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/fileexport/buttons.html5.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/fileexport/buttons.print.min.js') }}"></script>
		<script src="{{ url('spruha/plugins/datatable/fileexport/buttons.colVis.min.js') }}"></script>
		<script src="{{ url('spruha/js/table-data.js') }}"></script>

		<script src="{{url('spruha/plugins/darggable/jquery-ui-darggable.min.js') }}"></script>
		<script src="{{url('spruha/plugins/darggable/darggable.js') }}"></script>

		<!-- Internal salvado temporal de los envios -->
		<script type="text/javascript">
			$(function(){
				$("#guardar").click(function (e) { 
					e.preventDefault();
					var forma = $( "#enviosForm" ).serialize();
					$.ajax({
	                    /* Usar el route  */
	                    url: "{{route('envios.salvacion')}}",
	                    type: 'POST',
	                    /* send the csrf-token and the input to the controller */
	                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	                    data: forma,
	                   
	                    /* remind that 'data' is the response of the AjaxController */
	                    }).done(function( data ) {
						  	console.log("done");
						  	console.log(data.pieza)
						  	$("#spanClave").text( data.clave );
						  	$("#spanMensajeria").text( data.mensajeria );
						  	$("#spanRemitente").text( data.remitente );
						  	$("#spanDestinatario").text( data.destinatario );
						  	$("#spanPiezat").text( data.pieza );

						  	$("#guardarExito").modal("show");

						}).fail( function( jqXHR, textStatus, errorThrown ) {
						    console.log( "error" );
						    console.log(errorThrown);
						    console.log(textStatus);
						    alert("No se puede guardar intente otra vez o Consulte con su proveedor");
						    console.log(jqXHR);
						}).always(function() {
							console.log( "complete" );
						});
				});
			});
		</script>	
		<!-- Fin Internal salvado temporal de los envios -->

		<!-- Personalizacion de UlalaExpress -->
		<script type="text/javascript">
			var costoSeguroGlobal = 0;
			// Calculo de peso Bascula
			function calculo(argument) {
				console.log("test")
				var pieza = $("#pieza").val()
				var peso = $("#peso").val()
				var alto = $("#alto").val()
		        var ancho = $("#ancho").val()
		        var largo = $("#largo").val()

		        var bascula = peso*pieza
		        var dimensional = ((alto*ancho*largo)/5000)*pieza

				$('#bascula').val(bascula)
				$('#dimensional').val(dimensional)
			}

			function calculoSeguro () {
				// EL seguro es el valor del envio sin I.V.A por el 20%
				costoSeguroGlobal = ( $("#valorEnvio").val() *0.02);
				$('#costoSeguro').val('$'+costoSeguroGlobal)
			}

			$(function(){
				console.log("validar");
				$("#peso").on("change keyup paste", function (){
					calculo();
				});

				$("#alto").on("change keyup paste", function (){
			        calculo();
				});

				$("#ancho").on("change keyup paste ", function (){
					calculo();
				});

				$("#largo").on("change keyup paste", function (){
					calculo();
				});

			});

			$(function(){
				$("#embalaje1").on("change", function (){
					var embalaje = $(this).val()
					
					if (embalaje == 'sobre') {
						$(".embalaje").hide()
						$("#peso").removeAttr("required")
						$("#alto").removeAttr("required")
						$("#ancho").removeAttr("required")
						$("#largo").removeAttr("required")
					} else {
						$(".embalaje").show()
						$("#peso").attr("required","true");
						$("#alto").attr("required","true");
						$("#ancho").attr("required","true");
						$("#largo").attr("required","true");
					}
				});

			});

			// Seguro de envio
			$(function() {
				$('#checkSeguro').change(function() {
					var checkSeguro = $(this).is( ":checked" )
					if ( checkSeguro ) {
						$(".seguro").show()
						$("#valorEnvio").attr("required","true");
					} else {
						$(".seguro").hide()
						$("#valorEnvio").removeAttr("required")
					}
				  });
			});
			// fin Seguro de envio

			$("#valorEnvio").on("change keyup paste ", function (){
				calculoSeguro();
			});

			//Envio un submit desde el modal
			$("#envioAceptar").click(function(){
    			$('#enviosForm').submit();
			});

			// Validar Precio al Cliente antes de solicitar la Guia
			$("#preSubmit").click(function() {
				var form = $('#enviosForm').parsley().refresh();

				if ( form.validate() ){
					console.log($('.tipo_envio').val() )
					$.ajax({
	                    /* Usar el route  */
	                    url: "{{route('api.envios.precio')}}",
	                    type: 'GET',
	                    /* send the csrf-token and the input to the controller */
	                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	                    data: $('#enviosForm').serialize()
	                   
	                    /* remind that 'data' is the response of the AjaxController */
	                    }).done(function( data) {
						  	console.log("done");
						  	
						  	$("#spanPrecio").text( data.precio );
						  	$("#spanServicio").text( $("#servicio option:selected").text() );
							$("#spanEmbalaje").text( data.nombre );
							$("#spanPieza").text( data.piezas );
							$("#spanPeso").text( data.pesoMax );
							$("#spanSeguro").text("$"+costoSeguroGlobal);
							$("#modalEnviar").modal("show");

						}).fail( function( data,jqXHR, textStatus, errorThrown ) {
						    console.log( "fail" );
						    
						    alert( data.responseJSON.message);

						}).always(function() {
							console.log( "complete" );
						});


					
				} else {
					console.log( "enviosForm con errores" );
					return false;
				}
			});
			// Fin Validar Precio al Cliente antes de solicitar la Guia
		</script>
		<!-- Fin Personalizacion de UlalaExpress -->

		<!-- PAQUETE MULTIPIEZA -->
		<script type="text/javascript">
			$("#addRow").click(function () {
				console.log('AddRow')
		        var html = $("#clone").clone()
				$('#multiPieza').append(html);
				$("#clone").show()
				console.log($(".clone").length)
		    });
			
		    // remove row
		    $(document).on('click', '#removeRow', function () {
		        $(this).closest('#clone').remove();
		         console.log($(".clone").length)
		    });
		 </script>
		<!-- FIN PAQUETE MULTIPIEZA -->

{{--INTEGRACION DE ROLES Y USUARIOS--}}	
@yield('js_user_page')
@yield('js_rol_page')

		
	</body>
</html>
