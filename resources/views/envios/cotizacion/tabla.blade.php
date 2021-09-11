<div>
	<h6 class="main-content-label mb-12"></h6>	
</div>

<div class="table-responsive">
	<table id="exportCotizaciones" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>CREAR</th>
				<th>PAQUETERIA</th>
				<th>EMBALAJE</th>
				<th>PRECIO</th>
				<th>ORIGEN</th>
				<th>DESTINO</th>
				<th>PESO Estimado</th>
				<th>ZONA</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $cotizacion  as $item)
				<tr>
					<td><a href="{{ route('creacion', ['mensajeria'=>'fedex']) }} "><i class="si si-cursor"></i></a></td>
					<td>FEDEX</td>
					<td>{{ $item['costo'] -> tipo_envio }}</td>
					<td>{{ $item['costo'] -> precio }}</td>
					<td>{{ $item['origen']['entidad_federativa'] }}</td>
					<td>{{ $item['destino']['entidad_federativa'] }}</td>
					<td>{{ $item['costo'] -> peso }} Kg.</td>
					<td>{{ $item['costo'] -> zona }}</td>
				</tr>		
			@endforeach
		</tbody>
	</table>
</div>
