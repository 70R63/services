@extends('app')
@section('content')

{!! Form::open([ 'route' => 'envios.store', 'method' => 'POST' , 'class'=>'parsley-style-1', 'id'=>'enviosForm' ]) !!}
	<!-- Row Forma -->
	<div class="row row-sm">
		<div class="col-sm-12 col-md-3"> 
			<div class="card custom-card">
				<div class="card-header border-bottom-0 custom-card-header">
					<h6 class="main-content-label mb-0">Remitente</h6>
				</div>
				<div class="card-body">
					<div class="border"> 
						@include('envios.remitente.forma')
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-3">
			<div class="card custom-card">
				<div class="card-header border-bottom-0 custom-card-header">
					<h6 class="main-content-label mb-0">Destinatario</h6>
				</div>
				<div class="card-body">
					<div class="border">
						@include('envios.destinatario.forma')
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="card custom-card">
				<div class="card-header border-bottom-0 custom-card-header">
					<h6 class="main-content-label mb-0">Paquete</h6>
				</div>
				<div class="card-body">
					<div class="border">
						@include('envios.paquete.forma')
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Row -->

	<!-- Inicio Row Botones-->
	<div class="row row-sm">
		<div class="col-lg-12 col-md-6">
			<div class="form-group row justify-content-around">		
				<div></div>						
				<div>
				<a class="btn btn-success" data-toggle="modal" id="preSubmit" href="">		Enviar
				</a>
				<a href="{{ url()->previous() }}" class="btn btn-danger" >Cancelar</a>
				</div>
				<a id="guardar" href="" class="btn btn-primary" >Guardar</a>	
				
			</div>	
		</div>
	</div>
	<!-- Fin Row Botones-->
	
	<!-- Terminos y Condiciones Modal -->
	@include('envios.modals.submit')
	<!-- End Basic modal -->

{!! Form::close() !!}

@endsection