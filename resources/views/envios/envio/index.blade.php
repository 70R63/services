@extends('app')
@section('content')

<!-- Row Forma -->
<div class="row row-sm">
	<div class="col-sm-12 col-md-2 ">
		<div class="main-content-left-components">
			<div class="card custom-card">
				<div class="card-body ">
					<div class="p-3">
						<h6>CREAR </h6>
						<div class="media align-items-center">
							<div class="crypto-icon bg-primary-transparent text-primary"> 
								<i class="si si-envelope-letter wd-20 ht-20 text-center tx-18"></i>
							</div>
							<div class="media-body ml-3">
								<a class="tx-medium mg-b-3 tx-15" href="{{ route('creacion', ['tipo'=>'1']) }}">
								SOBRE
							</a>
							</div>
						</div>
					</div>
					<div class="p-3 border-top">
						<div class="media align-items-center">
							<div class="crypto-icon bg-primary-transparent text-primary"> 
								<i class="si si-social-dropbox wd-20 ht-20 text-center tx-18"></i>
							</div>
							<div class="media-body ml-3">
								<a class="tx-medium mg-b-3 tx-15" href="{{ route('creacion', ['tipo'=>'2']) }}">	UNA PIEZA
								</a>
							</div>
						</div>
					</div>
					<div class="p-3 border-top">
						<div class="media align-items-center">
							<div class="crypto-icon bg-primary-transparent text-primary"> 
								<i class="fe fe-server wd-20 ht-20 text-center tx-18"></i>
							</div>
							<div class="media-body ml-3">
								<a class="tx-medium mg-b-3 tx-15" href="{{ route('creacion', ['tipo'=>'3']) }}">	MULTI PIEZA
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<div class="col-sm-12 col-md-10"> 
		<div class="card custom-card">
			<div class="d-flex mb-3 p-3 border-bottom">
				<div class="align-items-center">
					<h4 class="d-flex">ENVIOS<span class="text-muted tx-13 ml-2 my-auto">(VISTA GENERAL)</span></h4>
				</div>						
			</div>
			<div class="card-body">
				<div class="border"> </div>
				@include('envios.envio.index.tabla')
			</div>
		</div>
	</div>
</div>
<!-- End Row -->
   
@endsection