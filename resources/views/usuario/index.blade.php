	@extends('app')
	@section('content')

<div class="row row-sm">
   <div class="col-sm-12 col-md-12">
      <div class="card custom-card ">
         <div class="card-header border-bottom-0 custom-card-header">
            <div class="col-sm-12 col-md-10">
               <h6 class="main-content-label mb-0">Tabla de usuarios en el sistema</h6>
            </div>
            <div class="col-sm-12 col-md-2">
               <a class="btn btn-success" href="{{route('users.create')}}" type="button">
               <i class="fe fe-user-plus mr-2"> Nuevo</i>
               </a>
            </div>
         </div>
         <div class="card-body">
            <div class="border">
            </div> 
            <div class="table-responsive userlist-table">
               <table id="datatable"  class="table table-striped table-bordered text-nowrap" >
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>E-MAIL</th>
                        <th>ROL</th>
                        <th>PERMISOS</th>
                        <th>HERRAMIENTAS</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($users as $users)
                     @if(!\Auth::user()->hasRol('sysadmin') && $users->hasRol('sysadmin' )) @continue; @endif
                     <tr>
                        <td>{{$users['id']}}</td>
                        <td>{{$users['name']}}</td>
                        <td>{{$users['email']}}</td>
                        <td>
                        	@if ($users->roles->isNotEmpty())
	                        	@foreach($users->roles as $rol)
	                        		<span class="badge badge-pill badge-warning"> {{$rol->name}}</span> 
	                        	@endforeach
                        	@endif
                        </td>
                        <td>
                         	@if ($users->permisos->isNotEmpty())
	                        	@foreach($users->permisos as $permiso)
	                        		<span class="badge badge-pill badge-secondary"> {{$permiso->name}}</span> 
	                        	@endforeach
                        	@endif                     
                        </td>
                        <td> <!-------------------- OTRO ESTILO DE BOTONES 
                           <a href="/users/{{ $users['id'] }} " class="text-info tx-18"><i class="pe-7s-look"></i></a>
                           <a href="/users/{{ $users['id'] }}/edit "  class="text-warning tx-18" ><i class="mdi mdi-account-card-details"></i></a>
                           <a href="#" data-toggle="modal" data-target="#deleteModal" data-userid="{{$users['id']}}"  class="text-danger tx-18"><i class="mdi mdi-account-remove"></i></a>

                          	-------------------------->
                          {{-- <a href="/users/{{ $users['id'] }} " class="btn btn-sm btn-primary"><i class="fe fe-search"></i></a> --}}
                           <a href="/users/{{ $users['id'] }}/edit "  class="btn btn-sm btn-info" ><i class="fe fe-edit-2"></i></a>
 						   <a href="#" data-toggle="modal" data-target="#deleteModal" data-userid="{{$users['id']}}"  class="btn btn-sm btn-danger"><i class="fe fe-trash"></i></a>
							
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
                  <tfoot>
		   			 <tr>
		     			 <td colspan="6"></td>
		    		</tr>
				   </tfoot>
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