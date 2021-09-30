	@extends('app')
	@section('content')


<!-- BOTON DE CREAR USUARIO -->
	<div class="row py-lg-2">
	    <div class="col-md-6">
	    </div>
	    <div class="col-md-6">
	        <a href="/users/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Usuario</a>
	    </div>
	</div>
<!-- BOTON DE CREAR USUARIO -->

	<div class="row row-sm">
		<div class="col-sm-12 col-md-1">	
		</div>

		<div class="card mb-3 col-sm-12 col-md-10"> 
			<div class="card-header">
				<i class="fas fa-table"></i>
				Tabla de usuarios en el sistema
			</div>
			<div class="card custom-card ">
	 	<div class="card-body">
			<div class="table-responsive">		
				<table class="table table-striped table-bordered text-nowrap" id="datatable" >
					<thead>
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>E-MAIL</th>
							<th>HERRAMIENTAS</th>
						</tr>
					</thead>

					<tbody>
						@foreach($users as $users)
						<tr>
							<td>{{$users['id']}}</td>
							<td>{{$users['name']}}</td>
							<td>{{$users['email']}}</td>
							<td>
								<a href="/users/{{ $users['id'] }} "><i class="fa fa-eye"></i></a>
								<a href="/users/{{ $users['id'] }}/edit "><i class="fa fa-edit"></i></a>
								 <a href="#" data-toggle="modal" data-target="#deleteModal" data-userid="{{$users['id']}}"><i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		    <!-- delete Modal-->
	        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	            <div class="modal-dialog" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">¿Segur@ de borrar el usuario?</h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	                </div>
	                <div class="modal-body">Confirma con el botón "eliminar".</div>
	                <div class="modal-footer">
	                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
	                <form method="POST" action="">
	                    @method('DELETE')
	                    @csrf
	                    {{-- <input type="hidden" id="user_id" name="user_id" value=""> --}}
	                    <a class="btn btn-success" onclick="$(this).closest('form').submit();">Eliminar</a>
	                </form>
	                </div>
	            </div>
	            </div>
	        </div>
	        <!-- delete Modal-->
		</div>
		</div> 
	</div>
</div>

	@section('js_user_page')

		<script src="/vendor/chart.js/Chart.min.js"></script>
		<script src="/js/admin/demo/chart-area-demo.js"></script>

		    <script>
		        $('#deleteModal').on('show.bs.modal', function (event) {
		            var button = $(event.relatedTarget) 
		            var user_id = button.data('userid') 
		            
		            var modal = $(this)
		            // modal.find('.modal-footer #user_id').val(user_id)
		            modal.find('form').attr('action','/users/' + user_id);
		        })
		    </script>

	@endsection

	@endsection