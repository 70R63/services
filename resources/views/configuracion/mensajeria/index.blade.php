@extends('app')
@section('content')

<!-- Row Forma -->
<div class="row row-sm">

	<div class="col-sm-12 col-md-10"> 
		<div class="card custom-card">
			<div class="d-flex mb-3 p-3 border-bottom">
				<div class="align-items-center">
					<h4 class="d-flex">MENSAJERIA<span class="text-muted tx-13 ml-2 my-auto">(BROKER)</span></h4>
				</div>
				<div></div>
				<a class="btn ripple btn-primary ml-auto" data-target="#modaldemo1" data-toggle="modal" href="">NUEVA</a>						
			</div>
          
			<div class="card-body">
				<div class="border"> </div>
				@include('configuracion.mensajeria.index.tabla')
			</div>
		</div>
	</div>

	
</div>
<!-- End Row -->

<!-- Basic modal -->
<div class="modal" id="modaldemo1">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">

{!! Form::open([ 'route' => 'mensajeria.store'
, 'method' => 'POST' , 'class'=>'parsley-style-1', 'id'=>'generalForm', 'enctype' => 'multipart/form-data' ]) !!}

			<div class="modal-header">
				<h6 class="modal-title">NUEVA MENSAJERIA</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<h6></h6>
				<div class="input-group mb-3">
				<div class="input-group-prepend">
					
				{!! Form::label('nombre'
					,'NOMBRE<span class="tx-danger">*</span>' 
					,['class' 		=> 'form-control'
						,'readonly'	=> 'true'
						
					]
					,false)
				!!}
					
				</div>
				{!! Form::text('nombre', null,
					['class' 		=> 'form-control'
					,'id'			=> 'nombre'
					,'placeholder'	=> 'Ingrese el nombre de la mensajeria'
					,'required'	=> 'true'
						
					])
				!!}
			</div>
			</div>
			<div class="modal-footer">
				<button class="btn ripple btn-primary" type="submit">Enviar</button>
			</div>
{!! Form::close() !!}
		</div>
	</div>
</div>
<!-- End Basic modal -->
   
@endsection