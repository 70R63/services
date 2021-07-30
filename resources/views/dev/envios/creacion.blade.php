@extends('dev.app')
@section('content')

{!! Form::open([ 'route' => 'dev.envios.store', 'method' => 'POST' , 'class'=>'parsley-style-1', 'id'=>'selectForm' ]) !!}
	<!-- Row Forma -->
	<div class="row row-sm">
		<div class="col-sm-12 col-md-3"> 
			<div class="card custom-card">
				<div class="card-header border-bottom-0 custom-card-header">
					<h6 class="main-content-label mb-0">Remitente</h6>
				</div>
				<div class="card-body">
					<div class="border"> 
						@include('dev.envios.remitente.forma')
						
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
						@include('dev.envios.destinatario.forma')
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
						@include('dev.envios/paquete/forma')
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Row -->

	<!-- Row Botones-->
	<div class="row row-sm">
		<div class="col-lg-12 col-md-12">
			<div class="form-group row justify-content-center mb-0">								
				<button type="submit" class="btn btn-success" >Enviar </button>
				<a id="guardar" href="" class="btn btn-primary" >Guardar</a>
				<a href="{{ url()->previous() }}" class="btn btn-danger" >Cancelar</a>
			</div>			
		</div>
	</div>
	<!-- Row Botones-->

{!! Form::close() !!}




@endsection