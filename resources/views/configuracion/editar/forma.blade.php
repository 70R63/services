<div class="row row-sm">
	<div class="col-lg-12">
		<div class="input-group mb-3">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					
				{!! Form::label('propiedad'
					,$config["propiedad"].'<span class="tx-danger">*</span>' 
					,['class' 		=> 'form-control'
						,'readonly'	=> 'true'
						
					]
					,false)
				!!}
					
				</div>
				{!! Form::text('valor', null,
					['class' 		=> 'form-control'
					,'id'			=> 'valor'
					,'placeholder'	=> 'Ingresa ul valor de FSC'
					,'required'	=> ''
						
					])
				!!}
			</div>
		</div>
	</div>
</div>	