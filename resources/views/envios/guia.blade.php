@extends('app')
@section('content')
<!-- Row Forma -->
<div class="row row-sm">
	<div class="col-sm-12 col-md-2">
		<div class="card custom-card">
			<h2>Resumen</h2> 
			</br>
			<h4> Remitene :</h4> 
			Nombre : {{ Session::get('remitente')->contactName }}</br>
			Compania : {{ Session::get('remitente')->corporateName }}	</br>
			CP : {{ Session::get('remitente')->zipCode }}</br>

			</br>
			<h4>Destinatario :</h4>
			Nombre : {{ Session::get('destinatario')->contactName }}</br>
			Compania : {{ Session::get('destinatario')->corporateName }}	</br>
			CP : {{ Session::get('destinatario')->zipCode }}</br>
		</div>
		<a class="btn btn-success" href="#" type="button">
			<i class="mdi mdi-barcode-scan"></i> Programar Recoleccion
		</a>
	</div>
	<div class="col-sm-12 col-md-10">
		<div class="card custom-card">
			<h1>Referencia de la GUIA {{ Session::get('idGuia') ?? '' }} </h1>
		    

		    <object type="application/pdf" width="100%" height="500px" data="{{  url('public/storage', sprintf('%s%s',Session::get('idGuia'),'.pdf') ) }}">
		    	<a rel="external" href="{{  url('public/storage', sprintf('%s%s',Session::get('idGuia'),'.pdf') ) }}">Click here to download the PDF</a>
		    </object>
		</div>
	</div>

</div>

@endsection