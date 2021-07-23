@extends('app')
@section('content')
<!-- Row Forma -->
<div class="row row-sm">
	<div class="col-sm-12 col-md-4">
		<div class="card custom-card">
			Resumen 
		</br>
			Remitene :
			{{ asset('storage/7050000000130700837640.pdf') }} 
				a ombre de asdfas</br>
				asfasdfasd</br>
				asdfasdfasdf</br>
</br>
				aasdfasf</br>
		</br>
			Destinatario
							a ombre de asdfas</br>
				asfasdfasd</br>
				asdfasdfasdf</br>
</br>
				aasdfasf</br>
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