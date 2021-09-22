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
					<h4 class="d-flex">MENSAJERIA<span class="text-muted tx-13 ml-2 my-auto">(BROKER)</span></h4>
				</div>
				<div></div>						
			</div>
          
			<div class="card-body">

				{!! Form::model($mensajeria, [ 'route' => ['mensajeria.update',$mensajeria ], 'method' => 'PUT', 'class' => 'form-horizontal' ,'role' => 'form']) 
					 !!}
					@include('configuracion.mensajeria.campos.forma')
				
			</div>
		</div>
		<button class="btn ripple btn-primary" type="submit">Guardar</button>
		<a class="btn ripple btn-secondary " href=" {{route('mensajeria.index')}}">Cancelar</a>
		{!! Form::close() !!}
	</div>
	<div class="col-sm-12 col-md-3">
	</div>
</div>
<!-- End Row -->   
@endsection