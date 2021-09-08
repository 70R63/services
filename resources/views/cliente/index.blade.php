@extends('app')
@section('content')

<!-- Row Forma -->
<div class="row row-sm">
	<div class="col-sm-12 col-md-12"> 
		<div class="card custom-card">
			<div class="card-header border-bottom-0 custom-card-header">
				<div class="col-sm-12 col-md-10">
					<h6 class="main-content-label mb-0">C L I E N T E S </h6>
					
				</div>
			</div>

			<div class="card-body">
				<div class="border"> </div>
				@include('cliente.index.tabla')
			</div>
		</div>
	</div>
</div>
<!-- End Row -->

@endsection
