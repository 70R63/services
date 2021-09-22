<div class="table-responsive">
	<table id="exportCotizaciones" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>RAZON SOCIAL</th>
				<th>RESPONSABLE LEGAL</th>
				<th>EMAIL</th>
				<th>DESCUENTO</th>
				<th>LICENCIA</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $cliente  as $item)

			<tr>
				<td>{{ $item['razon_social'] }}</td>
				<td>{{ $item['responsable_legal'] }}</td>
				<td>{{ $item['email'] }}</td>
				<td>{{ $item['descuento'] }}%</td>
				<td>{{ $item['licencia'] }}</td>
				<td class="text-center">
					<a href="{{ route('cliente.edit', $item['id']) }}" class="text-warning tx-28" >
						<i class="pe-7s-note"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
		    <tr>
		      <td colspan="3"></td>
		    </tr>
		</tfoot>
		
	</table>
</div>