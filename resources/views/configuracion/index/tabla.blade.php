<div class="table-responsive">
	<table id="exportCotizaciones" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>POPIEDAD</th>
				<th>VALOR</th>
				<th>DESCRIPCION</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $config  as $item)
			<tr>
				<td>{{ $item['propiedad'] }}</td>
				<td>{{ $item['valor'] }}</td>
				<td>{{ $item['descripcion'] }}</td>
				
					<td class="text-center">
						
						<a href="{{ route('configuracion.edit', $item['id']) }}" class="text-warning tx-28" >
							<i class="pe-7s-note"></i>
						</a>
					</td>
					
			</tr>
			@endforeach
		</tbody>
		<tfoot>
		    <tr>
		      <td colspan="3">Todos los Derechos reservados</td>
		      
		    </tr>
		</tfoot>
		
	</table>
</div>