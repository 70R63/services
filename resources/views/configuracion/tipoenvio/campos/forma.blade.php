<div class="row row-sm">
	<div class="col-lg-12">
		
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					
				{!! Form::label('nombre'
					,'NOMBRE<span class="tx-danger">*</span>' 
					,['class' 		=> 'form-control'
						,'readonly'	=> 'true'
						
					]
					,false)
				!!}
					
				</div>
				{!! Form::text('nombre', null,
					['class' 		=> 'form-control'
					,'id'			=> 'nombre'
					,'placeholder'	=> 'Ingrese el nombre de la mensajeria'
					,'required'	=> 'true'
						
					])
				!!}
			</div>
		
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					
				{!! Form::label('estatus'
					,'ESTATUS<span class="tx-danger">*</span>' 
					,['class' 		=> 'form-control'
						,'readonly'	=> 'true'
						
					]
					,false)
				!!}
					
				</div>

				{!! Form::select('estatus', $estatus
					,$tipoEnvio['estatus']
					,['class' 		=> 'form-control'
						,'placeholder'	=> 'Seleccionar'
						,'required'	=> ''
						,'name'		=> 'estatus'
						,'id'		=> 'estatus'
					]);
				!!}	
			</div>
		
	</div>
</div>	