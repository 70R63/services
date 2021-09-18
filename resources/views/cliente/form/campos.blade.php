<div class="row row-sm">
	<div class="col-md-12">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">
					RAZON SOCIAL	 
					<span class="tx-danger">*</span>
				</span>
			</div>
			
			{!! Form::text('razon_social', null,
				['class' 		=> 'form-control'
					,'placeholder'	=> 'Razon Social '
					,'id'		=> 'razon_social'
					,'required'	=>	'true'
				])
			!!}
			   
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">
					RESPONSABLE LEGAL <span class="tx-danger">*</span>
				</span>
			</div>
			{!! Form::text('responsable_legal'
				, null
				,['class' 		=> 'form-control'
					,'placeholder'	=> 'Nombre de la Persona Fisica '
					,'id'		=> 'responsable_legal'
					,'required'	=>	'true'
				])
			!!}
		</div>
		
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Descuento (%) <span class="tx-danger">*</span></span>
			</div>
			<div class="handle-counter" id="handleCounterMax100">
				<text class="counter-minus btn btn-light">-</text>
				
				{!! Form::text('descuento'
				, null
				,['class' 		=> 'form-control'
					,'id'		=> 'descuento'
					,'required'	=>	'true'
				])
			!!}

				<text class="counter-plus btn btn-light">+</text>
			</div>
		</div>
		
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">TIPO DE LICENCIA <span class="tx-danger">*</span></span>
			</div>

			{!! Form::select('LICENCIA'
				, array(
			    	'1' 	=> 'ESTANDAR'
			    	,'2' 	=> 'ESTANDAR+'
			    	,'3'	=>	'EMPRESARIAL')
				,$cliente['licencia'] ?? '1'
				,['class' 		=> 'form-control'
					,'placeholder'	=> 'Seleccionar'
					,'required'	=> 'true'
					,'name'		=> 'licencia'
					,'id'		=> 'licencia'
				]);
			!!}
		</div>
		
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">@</span>
			</div>
			{!! Form::email('email'
				,null
				,['class' 		=> 'form-control'
					,'placeholder'	=> 'Nombre de la Persona Fisica '
					,'id'		=> 'email'
					,'required'	=>	'true'
				]
			); !!}
		</div>
	</div>
</div>