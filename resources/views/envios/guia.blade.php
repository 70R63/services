@extends('app')
@section('content')
<!-- Row Forma -->
<div class="row row-sm">
	<div class="col-sm-12 col-md-4">
		<div class="card custom-card">
			Resumen 
		</br>
			Remitene :
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
			<h1>PDF Example with iframe</h1>
		    

		    <object type="application/pdf" width="100%" height="500px" data="{{  url('public/pdf/label1.pdf') }}">
		    			    <a rel="external" href="{{  url('public/pdf/label1.pdf') }}">Click here to download the PDF</a>
		    </object>
		</div>
	</div>
</div>

@endsection