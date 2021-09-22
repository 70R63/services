@extends('app')
@section('content')
<!-- Row Forma -->
<div class="row row-sm">
	<div class="col-sm-12 col-md-1">
		
	</div>
	<div class="col-sm-12 col-md-10 ">
		<div class="card custom-card ">
			<div class="card-header border-bottom-0 custom-card-header">
				<h6 class="main-content-label mb-0">Cotizaciones</h6>
			</div>
			<div class="card-body">
				@include('envios.cotizacion.resumen')
				@include('envios.cotizacion.tabla')
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-1">
		
	</div>
</div>

@endsection