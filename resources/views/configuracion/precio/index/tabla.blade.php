<div class="table-responsive">
	<table id="configPrecio" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>MENSAJERIA</th>
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
			</tr>
		</thead>
		<tbody>

			@foreach( $tabla  as $idMensajeria => $precios)
				@foreach( $precios  as $tipoEnvio => $precio)
					@foreach( $precio  as $peso => $item)
					<tr>
						<td>{{ $idMensajeria }}</td>
						<td>{{ $tipoEnvio }}</td>
						<td> {{ $peso }}kg </td>
						@foreach( $item  as $key => $value) 
							<td>{{ $value['precio'] }}</td>
						@endforeach
						</tr>	
					@endforeach				
				@endforeach	
			@endforeach

		</tbody>
		<tfoot>
		    <tr>
		      <td colspan="11">Los precios son responsabilidad del cliente</td>
		    </tr>
		</tfoot>
		
	</table>
</div>