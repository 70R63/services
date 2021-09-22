@extends('app')
@section('content')

<!-- Row Forma -->
<div class="row row-sm">

	<div class="col-sm-12 col-md-10"> 
		<div class="card custom-card">
			<div class="card-header border-bottom-0 custom-card-header">
				<h6 class="main-content-label mb-0">C O N F I G U R A C I &oacute; N</h6>
			</div>
			<div class="card-body">
				<div class="border"> </div>
				@include('configuracion.index.tabla');
			</div>
		</div>
	</div>

	
</div>
<!-- End Row -->

@endsection