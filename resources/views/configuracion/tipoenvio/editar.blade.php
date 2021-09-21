@extends('app')
@section('content')

<!-- Row Forma -->
<div class="row row-sm">
	<div class="col-sm-12 col-md-3">
	</div>
	<div class="col-sm-12 col-md-6"> 
		<div class="card custom-card">
			<div class="d-flex mb-3 p-3 border-bottom">
				<div class="align-items-center">
					<h4 class="d-flex">TIPO ENVIO<span class="text-muted tx-13 ml-2 my-auto"></span></h4>
				</div>
				<div></div>						
			</div>
          
			<div class="card-body">

				{!! Form::model($tipoEnvio, [ 'route' => ['tipo.update',$tipoEnvio ], 'method' => 'PUT', 'class' => 'form-horizontal' ,'role' => 'form']) 
					 !!}
					@include('configuracion.tipoenvio.campos.forma')
				
			</div>
		</div>
		<button class="btn ripple btn-primary" type="submit">Guardar</button>
		<a class="btn ripple btn-secondary " href=" {{route('tipoenvio.index')}}">Cancelar</a>
		{!! Form::close() !!}
	</div>
	<div class="col-sm-12 col-md-3">
	</div>
</div>
<!-- End Row -->   
@endsection