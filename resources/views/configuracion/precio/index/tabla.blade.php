<div class="table-responsive">
	<table id="configPrecio" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>TIPO ENVIO</th>
				<th>PESO (KG)</th>
				<th>ZONA 1</th>
				<th>ZONA 2</th>
				<th>ZONA 3</th>
				<th>ZONA 4</th>
				<th>ZONA 5</th>
				<th>ZONA 6</th>
				<th>ZONA 7</th>
				<th>ZONA 8</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $tabla  as $tipo => $item)
				@foreach( $item  as $peso => $zoneo)
				<tr>
					<td>{{ $tipo }}</td>
					<td>{{ $peso }}</td>
					@foreach( $zoneo  as $key => $item)
						<td>{{ $item['precio'] }}</td>
					@endforeach
					<td></td>
				</tr>
				@endforeach
			@endforeach

		</tbody>
		<tfoot>
		    <tr>
		      <td colspan="3"></td>
		    </tr>
		</tfoot>
		
	</table>
</div>