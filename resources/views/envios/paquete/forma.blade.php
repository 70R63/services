<div class="row row-sm">
	<div class="col-lg-12">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Servicio <span class="tx-danger">*</span></span>
				
			</div>
			
			{!! Form::text('servicio', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'Tipo de Servicio'
				,'type'	=> 'text'
				,'required'	=> ''

				])
			!!}
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Pieza <span class="tx-danger">*</span></span>
			</div>
			{!! Form::text('pieza', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'pieza'
				,'required'	=> ''

				])
			!!}


			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Peso <span class="tx-danger">*</span></span>
			</div>
			{!! Form::text('peso', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'Peso Bascula'
				,'required'	=> ''

				])
			!!}

		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Dimensiones <span class="tx-danger">*</span></span>
			</div>
			{!! Form::text('Largo', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'Largo '
				,'required'	=> ''
				])
			!!}

			{!! Form::text('Ancho', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'Ancho  '
				,'required'	=> ''
				])
			!!}

			{!! Form::text('Alto', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'Alto '
				,'required'	=> ''
				])
			!!}
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Peso Dimensional <span class="tx-danger">*</span></span>
			</div>
			{!! Form::text('calle', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'Peso Dimensional '
				,'required'	=> ''
				])
			!!}
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Embalaje <span class="tx-danger">*</span></span>
			</div>
			{!! Form::text('embalaje', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'embalaje'
				,'required'	=> ''
				])
			!!}
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"> Contenido <span class="tx-danger">*</span></span>
			</div>
			{!! Form::text('contenido', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'contenido'
				,'required'	=> ''
				,'pattern'	=> '\d{5}'
				])
			!!}
			
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"> Seguro para el Envio <span class="tx-danger">*</span></span>
			</div>
			{!! Form::text('seguro', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'Seguro'
				,'required'	=> ''
				])
			!!}
		</div>							

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"> Valor de Envio <span class="tx-danger">*</span></span>
			</div>
			{!! Form::text('valor_envio', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'Valor de Envio'
				,'required'	=> ''
				])
			!!}
		</div>

		
	</div>
</div>