@extends('app')
@section('content')

<!-- Row Forma -->
<div class="row row-sm">
	<div class="col-xl-9 col-lg-12"> 
		<div class="card custom-card">
			<div class="d-flex mb-3 p-3 border-bottom">
				<div class="align-items-center">
					<h4 class="d-flex">GUIA<span class="text-muted tx-13 ml-2 my-auto">MEXICO</span></h4>
				</div>
				<div></div>
				<a class="btn ripple btn-primary ml-auto" data-target="#modaldemo1" data-toggle="modal" href="">BOTON</a>
				
											
										
			</div>
          
			<div class="card-body">
				<div class="border"> </div>
				@include('envios.guia.index.tabla')
			</div>
		</div>
	</div>

	
	<div class="col-xl-3 col-lg-12 d-none d-xl-block custom-leftnav">
		<div class="main-content-left-components">
			<div class="card custom-card">
				<div class="card-body component-item">
					<div class="p-3">
						<h6>ESTATUS GUIAS</h6>
						<div class="main-traffic-detail-item">
							<div>
								<span>Guia Nueva</span> <span>35%</span>
							</div>
							<div class="progress">
								<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar progress-bar-xs wd-35p" role="progressbar"></div>
							</div>
						</div>
					</div>

					<div class="p-3 border-top">
						<div class="main-traffic-detail-item">
							<div>
								<span>Guia En Transito</span> <span>50%</span>
							</div>
							<div class="progress progress-bar-xs">
								<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar progress-bar-xs wd-50p bg-secondary" role="progressbar"></div>
							</div>
						</div>
					</div>

					<div class="p-3 border-top">
						<div class="main-traffic-detail-item">
							<div>
								<span>Pendiente de Recoleccion</span> <span>70%</span>
							</div>
							<div class="progress progress-bar-xs">
								<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" class="progress-bar progress-bar-xs wd-70p bg-success" role="progressbar"></div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
<!-- Row Forma -->

<!-- Basic modal -->
<div class="modal" id="modaldemo1">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo">

{!! Form::open([ 'route' => 'precio.store.masivo'
, 'method' => 'POST' , 'class'=>'parsley-style-1', 'id'=>'enviosForm', 'enctype' => 'multipart/form-data' ]) !!}

			<div class="modal-header">
				<h6 class="modal-title">upload csv</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<h6></h6>
				
					
						<div class="form-group">
						  <label for="files">Cargar el archivo en formato CSV:</label>
						  <input type="file" id="precioCSV" name="precioCSV"  class="form-control" accept=".csv" required />
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