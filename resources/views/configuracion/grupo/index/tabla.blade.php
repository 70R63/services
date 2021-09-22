<div class="table-responsive">
	<table id="grupoTabla" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>MENSAJERIA</th>
				<th>ENTIDAD FEDERATIVA</th>
				<th>CP. INICIAL</th>
				<th>CP. FINAL</th>
				<th>GRUPO</th>
				
			</tr>
		</thead>
		<tbody>

			@foreach( $tabla as $key => $item)
			<tr>
				<td>{{ $item['mensajeria'] }}</td>
				<td>{{ $item['entidad_federativa'] }}</td>
				<td>{{ $item['cp_inicial'] }}</td>
				<td>{{ $item['cp_final'] }}</td>
				<td>{{ $item['grupo'] }}</td>
				
			</tr>
			@endforeach
		

		</tbody>
		<tfoot>
		    <tr>
		      <td colspan="5">Los Rangos de grupos son responsabilidad del Cliente</td>
		    </tr>
		</tfoot>
		
	</table>
</div>