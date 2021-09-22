{!! Form::open([ 'route' => 'envios.cotizaciones.create', 'method' => 'GET' , 'class'=>'parsley-style-1', 'id'=>'cotizacionesForm' ]) !!}
<div class="row row-sm">
	<div class="col-sm-12 col-md-2">
		<div class="card custom-card"> 
		</div>
	</div>
	<!-- Seccion central de cotizaciones -->

		<div class="col-sm-12 col-md-4">
		
			<h6 class="main-content-label mb-0">ORIGEN</h6>
			<br></br>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Pais <span class="tx-danger">*</span></span>
				</div>
				{!! Form::select('pais', array(
				    'MEX' 	=> 'Mexico'
				    )
					,'MEX'
					,['class' 		=> 'form-control'
						,'placeholder'	=> 'Seleccionar'
						,'required'	=> ''
						,'name'		=> 'pais'
						,'id'		=> 'pais'
					]);
				!!}
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Codigo Postal <span class="tx-danger">*</span></span>
				</div>
				{!! Form::text('cp', null,
					['class' 		=> 'form-control'
					,'id'			=> 'cp'
					,'placeholder'	=> 'Codigo Postal'
					,'required'	=> ''
					,'pattern'	=> '\d{5}'
					])
				!!}
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Peso (kg) <span class="tx-danger">*</span></span>
				</div>
				{!! Form::text('peso', null,
					['class' 		=> 'form-control'
					,'id'			=> 'peso'
					,'placeholder'	=> 'Peso aproximado'
					,'required'	=> ''
					
					])
				!!}
			</div>		
		</div>
		<div class="col-sm-12 col-md-4">
			<h6 class="main-content-label mb-0">DESTINO</h6>
			<br></br>
			<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Pais <span class="tx-danger">*</span></span>
					</div>
					{!! Form::select('pais_d', array(
					    'MEX' 	=> 'Mexico'
					    )
						,'MEX'
						,['class' 		=> 'form-control'
							,'placeholder'	=> 'Seleccionar'
							,'required'	=> ''
							,'name'		=> 'pais_d'
							,'id'		=> 'pais_d'
						]);
					!!}
			</div>
			<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Codigo Postal <span class="tx-danger">*</span></span>
					</div>
					{!! Form::text('cp_d', null,
						['class' 		=> 'form-control'
						,'id'			=> 'cp_d'
						,'placeholder'	=> 'Codigo Postal'
						,'required'	=> ''
						,'pattern'	=> '\d{5}'
						])
					!!}
			</div>	
		</div>
	
	

	<div class="col-sm-12 col-md-2">
		<div class="card custom-card">
			<div class="form-group row justify-content-around">	
					<input class="btn btn-success" type="submit" value="Cotizar">
				</div>	 
		</div>
	</div>
</div>
{!! Form::close() !!}
<div class="border"></div>
