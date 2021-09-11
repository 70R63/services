<div class="table-responsive">
	<table id="exportGeneral" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>NOMBRE</th>
				<th>CLAVE</th>
				<th>ESTATUS</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $tabla as $key => $item)
			<tr>
				<td>{{ $item['nombre'] }}</td>
				<td>{{ $item['clave'] }}</td>
				<td>
					<span class="badge {{config('css.'.$item['estatus'])}} badge-pill">Completed</span>
				</td>
				<td></td>
				
			</tr>
			@endforeach

		</tbody>
		<tfoot>
		    <tr>
		      <td colspan="4"></td>
		    </tr>
		</tfoot>
		
	</table>
</div>