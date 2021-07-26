@extends('app')
@section('content')
<!-- Row Forma -->
<div class="row row-sm">
	<div class="col-sm-12 col-md-4">
		<div class="card custom-card">
			Resumen 
		</br>
		</br>
			Remitene : </br>
			Nombre : {{ Session::get('remitente')['nombre'] }}</br>
			Compania : {{ Session::get('remitente')['compania'] }}	</br>

		</br>
			Destinatario</br>
			Nombre : {{ Session::get('destinatario')['nombre'] }}</br>
			Compania : {{ Session::get('destinatario')['compania'] }}	</br>
		</div>

	</div>
	<div class="col-sm-12 col-md-8">
		<div class="card custom-card">
			<h1>Refrencia de la GUIA {{ Session::get('idGuia') ?? '' }} </h1>
		    

		    <object type="application/pdf" width="100%" height="500px" data="{{  url('public/storage', sprintf('%s%s',Session::get('idGuia'),'.pdf') ) }}">
		    	<a rel="external" href="{{  url('public/pdf', sprintf('%s%s',Session::get('idGuia'),'.pdf') ) }}">Click here to download the PDF</a>
		    </object>
		</div>
	</div>
</div>

@endsection