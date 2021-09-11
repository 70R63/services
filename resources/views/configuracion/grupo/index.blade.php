@extends('app')
@section('content')

<!-- Row Forma -->
<div class="row row-sm">

	<div class="col-sm-12 col-md-10"> 
		<div class="card custom-card">
			<div class="d-flex mb-3 p-3 border-bottom">
				<div class="align-items-center">
					<h4 class="d-flex">GRUPOS<span class="text-muted tx-13 ml-2 my-auto">Postales</span></h4>
				</div>
				<div></div>
				<a class="btn ripple btn-primary ml-auto" data-target="#modalGrupo" data-toggle="modal" href="">CARGA MASVIA</a>					
			</div>
          
			<div class="card-body">
				<div class="border"> </div>
					@include('configuracion.grupo.index.tabla')
			</div>
		</div>
	</div>

	
</div>
<!-- End Row -->


<!-- Basic modal -->
<div class="modal" id="modalGrupo">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">

		{!! Form::open([ 'route' => 'grupo.store'
		, 'method' => 'POST' , 'class'=>'parsley-style-1', 'id'=>'grupoForm', 'enctype' => 'multipart/form-data' ]) !!}

			<div class="modal-header">
				<h6 class="modal-title">upload csv</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<h6></h6>
				<div class="form-group">
					<label for="files">Cargar el archivo en formato CSV:</label>
				  	<input type="file" id="grupoCSV" name="grupoCSV"  class="form-control" accept=".csv" required />
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn ripple btn-primary" type="submit">Enviar</button>
				<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
			</div>
		{!! Form::close() !!}
		</div>
	</div>
</div>
<!-- End Basic modal -->
   
@endsection