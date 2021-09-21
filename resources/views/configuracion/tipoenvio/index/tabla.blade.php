<div class="table-responsive">
	<table id="exportGeneral" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>CLAVE</th>
				<th>NOMBRE</th>
				<th>DESCRIPCION</th>
				<th>ESTATUS</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $tabla as $key => $item)
			<tr>
				<td>{{ $item['clave'] }}</td>
				<td>{{ $item['nombre'] }}</td>
				<td>{{ $item['descripcion'] }}</td>
				<td>
					<span class="badge {{config('css.'.$item['estatus'])}} badge-pill tx-14 ">{{$item['desc']}}</span>
				</td>
				<td>
					<a href="{{route('tipo.edit',$item['clave']) }}" class="remove-list text-info tx-20 edit-button" >
						<i class="si si-note"></i>
					</a>
				</td>
				
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