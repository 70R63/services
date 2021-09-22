@extends('app')
@section('content')

<!-- Row Forma -->
<div class="row row-sm">

	<div class="col-sm-12 col-md-10"> 
		<div class="card custom-card">
			<div class="d-flex mb-3 p-3 border-bottom">
				<div class="align-items-center">
					<h4 class="d-flex">TIPO DE ENVIO<span class="text-muted tx-13 ml-2 my-auto"></span></h4>
				</div>
				<div></div>						
			</div>
          
			<div class="card-body">
				<div class="border"> </div>
				@include('configuracion.tipoenvio.index.tabla')
			</div>
		</div>
	</div>

	
</div>
<!-- End Row -->
@endsection