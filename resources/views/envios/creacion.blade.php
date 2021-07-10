@extends('app')

@section('content')

<!-- Row -->
<div class="row row-sm">
	<div class="col-sm-12 col-md-4">
		<div class="card custom-card">
			<div class="card-header border-bottom-0 custom-card-header">
				<h6 class="main-content-label mb-0">Remitente</h6>
			</div>
			<div class="card-body">
				<div class="border">
					<div class="row row-sm">
						<div class="col-lg-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Pais</span>
								</div>
								<input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="Pais" type="text">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Nombre</span>
								</div>
								<input aria-describedby="basic-addon1" aria-label="Nombre" class="form-control" placeholder="Nombre" type="text">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-4">
		<div class="card custom-card">
			<div class="card-header border-bottom-0 custom-card-header">
				<h6 class="main-content-label mb-0">Destinatario</h6>
			</div>
			<div class="card-body">
				<div class="border">
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-4">
		<div class="card custom-card">
			<div class="card-header border-bottom-0 custom-card-header">
				<h6 class="main-content-label mb-0">Paquete</h6>
			</div>
			<div class="card-body">
				<div class="border">
				</div>
			</div>
		</div>
	</div>


</div>
<!-- End Row -->
@endsection