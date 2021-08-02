<div class="row row-sm">
	<div class="col-md-12">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Servicio 
					<span class="tx-danger">*</span>
				</span>
			</div>
			
			   {!! Form::select('servicio', array(
				    '70' 	=> 'Terrestre'
				    ,'60' 	=> 'Sig. Dia'
				    ,'50'	=>	'2 Dias')
					,null
					,['class' 		=> 'form-control'
						,'placeholder'	=> 'Seleccionar'
						,'required'	=> ''
						,'name'		=> 'servicio'
					]);
				!!}
		
			<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Embalaje <span class="tx-danger">*</span></span>
			</div>
				{!! Form::select('embalaje', array(
				    'sobre' =>'Sobre',
				    'miEmbalaje' => 'Mi Embalaje')
					,null
					,['class' 		=> 'form-control'
						,'placeholder'	=> 'Seleccionar'
						,'required'	=> ''
						,'name'		=> 'embalaje'
						,'id'		=> 'embalaje'
					]);
				!!}
		</div>
		
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Pieza <span class="tx-danger">*</span></span>
				</div>
				<div class="handle-counter" id="handleCounterMax28">
					<text class="counter-minus btn btn-light">-</text>
					<input type="text" value="1" class="form-control" name="pieza" id="pieza"required="">
					<text class="counter-plus btn btn-light">+</text>
				</div>
			</div>
			<div class="embalaje">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Peso (Kg.) <span class="tx-danger">*</span></span>
					</div>
					{!! Form::text('peso', null,
						['class' 		=> 'form-control'
						,'placeholder'	=> ' 0.1 Kg 1 Kg'
						,'required'	=> ''
						,'id'		=> 'peso'

						])
					!!}
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Bascula (Kg.)<span class="tx-danger">*</span></span>
					</div>
					{!! Form::text('bascula', null,
						['class' 		=> 'form-control'
						,'id'			=> 'bascula'
						,'placeholder'	=> 'Bascula, 0.1 Kg 1 Kg'
						,'required'	=> ''
						,'disabled'	=> ''
						])
					!!}
				</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Dimensiones <span class="tx-danger">*</span></span>
				</div>
				{!! Form::text('Largo', null,
					['class' 		=> 'form-control'
					,'id'			=> 'largo'
					,'placeholder'	=> 'Largo '
					,'required'	=> ''
					])
				!!}

				{!! Form::text('Ancho', null,
					['class' 		=> 'form-control'
					,'id'			=> 'ancho'
					,'placeholder'	=> 'Ancho  '
					,'required'	=> ''
					])
				!!}

				{!! Form::text('Alto', null,
					['class' 		=> 'form-control'
					,'id'			=> 'alto'
					,'placeholder'	=> 'Alto '
					,'required'	=> ''
					])
				!!}
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Peso Dimensional <span class="tx-danger">*</span></span>
				</div>
				{!! Form::text('dimensional', null,
					['class' 		=> 'form-control'
					 ,'id'			=> 'dimensional'
					,'placeholder'	=> 'Peso Dimensional '
					,'required'	=> ''
					,'disabled'	=> ''
					])
				!!}
			</div>

		</div>
		<!-- Fin Class Embalaje -->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"> Contenido <span class="tx-danger">*</span></span>
			</div>
			{!! Form::text('contenido', null,
				['class' 		=> 'form-control'
				,'placeholder'	=> 'Breve descripcion del paquete'
				,'required'	=> ''
					
				])
			!!}
			
		</div>

		<div class="input-group mb-3">

			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Seguro </span>
			</div>
			<label class="custom-switch">
				<input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
				<span class="custom-switch-indicator"></span>
				
			</label>
			<div class="main-toggle-group-demo mg-t-10">
				<div class="main-toggle main-toggle-success on">
					<span></span>
				</div>
			</div>					
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