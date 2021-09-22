<div class="table-responsive">
	<table id="exportGeneral" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>MENSAJERIA</th>
				<th>GRUPO ORIGEN</th>
				<th>GRUPO DESTINO</th>
				<th>ZONA</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $tabla as $key => $item)
			<tr>
				<td>{{ $item['mensajeria'] }}</td>
				<td>Origen_{{ $item['grupo_origen'] }}</td>
				<td>Destino_{{ $item['grupo_destino'] }}</td>
				<td>Zona_{{ $item['zona'] }}</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
		    <tr>
		      <td colspan="4">Las Zonas de Envio son responsabilidad del Empresa</td>
		    </tr>
		</tfoot>
		
	</table>
</div>