@extends('app')
@section('content')

<!-- Row Forma -->
<div class="row row-sm">

	<div class="col-sm-12 col-md-10"> 
		<div class="card custom-card">
			<div class="card-header border-bottom-0 custom-card-header">
				<h6 class="main-content-label mb-0">E D I T A R   -   C O N F I G U R A C I &oacute; N</h6>
			</div>
			<div class="card-body">
				<div class="border"> </div>
				{!! Form::model($config, [ 'route' => ['configuracion.update',$config], 'method' => 'PUT', 'class' => 'form-horizontal' ,'role' => 'form']) 
					 !!}
						@include('configuracion.editar.forma')

						<div class="form-actions center no-padding-right">
							<a href="{{ route('configuracion.index') }}" class="btn btn-info" >Regresar</a>
							<button type="submit" class="btn btn-success" >Guardar </button>
							
						</div>
					{!! Form::close() !!}
			</div>

		</div>
	</div>

	
</div>
<!-- End Row -->

@endsection