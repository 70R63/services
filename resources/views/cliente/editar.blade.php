@extends('app')
@section('content')
{!! Form::model($cliente,['route' => ['cliente.update',$cliente], 'method' => 'PUT' , 'class'=>'parsley-style-1', 'id'=>'clienteForm' ]) !!}

	<!-- Row Form -->
	<div class="row row-sm">
		<div class="col-sm-12 col-md-12"> 
			<div class="card custom-card">
				<div class="card-header border-bottom-0 custom-card-header">
					<div class="col-sm-12 col-md-10">
						<h6 class="main-content-label mb-0">E D I T A R   -   C L I E N T E  </h6>
						
					</div>
				</div>

				<div class="card-body">
					<div class="border"> </div>
					@include('cliente.form.campos')
				</div>
			</div>
		</div>
	</div>
	<!-- End Row Form-->
	<!-- Inicio Row Botones-->
	<div class="row row-sm">
		<div class="col-lg-12 col-md-6">
			<div class="form-group row justify-content-around">		
				<input class="btn btn-success" type="submit" value="Cliente">
				
			</div>	
		</div>
	</div>
	<!-- Fin Row Botones-->
{!! Form::close() !!}
@endsection
