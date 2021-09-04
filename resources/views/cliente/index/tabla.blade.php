<div class="table-responsive">
	<table id="exportCotizaciones" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>NOMBRE</th>
				<th>EMAIL</th>
				<th>DESCRIPCION</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $cliente  as $item)

			<tr>
				<td>{{ $item['name'] }}</td>
				<td>{{ $item['email'] }}</td>
				<td></td>
				
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