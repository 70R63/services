	@extends('app')
	@section('content')



<div class="row row-sm">
   <div class="col-sm-12 col-md-12">
      <div class="card custom-card ">
         <div class="card-header border-bottom-0 custom-card-header">
            <div class="col-sm-12 col-md-10">
               <h6 class="main-content-label mb-0">Tabla de roles del sistema</h6>
            </div>
            <div class="col-sm-12 col-md-2">
               <a class="btn btn-success" href="{{route('roles.create')}}" type="button">
               <i class="fe fe-user-plus mr-2"> Nuevo</i>
               </a>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table  id="datatable"  class="table table-striped table-bordered text-nowrap" >
                  <thead>
                     <tr>
                        <!-- <th>ID</th> -->
                        <th>ROL</th>
                        <th>SLUG</th>
                        <th>PERMISOS</th>
                        <th>HERRAMIENTAS</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($roles as $roles)
                     <tr>
                        <!-- <td>{{$roles['id']}}</td> -->
                        <td>{{$roles['name']}}</td>
                        <td>{{$roles['slug']}}</td>
                        <td>
                           @if ($roles->permisos != null)                                  
                           		@foreach ($roles->permisos as $permiso)
                           			<span class="badge badge-pill badge-success-light">
                           				{{ $permiso->name }}                                    
                           			</span>
                           		@endforeach                           
                           @endif
                        </td>
                        <td>
                          {{-- <a href="{{route('roles.show',$roles['id']) }} "><i class="fa fa-eye"></i></a> --}}
                           <a href="{{route('roles.edit',$roles['id']) }} "><i class="fa fa-edit"></i></a>	
                           <a href="#" data-toggle="modal" data-target="#deleteModalRole" data-rolid="{{ $roles['id'] }}"><i class="fas fa-trash-alt"></i></a>							
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
            <div class="modal fade" id="deleteModalRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Segur@ de borrar el Rol?</h5>
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
                           {{-- <input type="text" id="rol_id" name="rol_id" value=""> --}}
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

	@section('js_rol_page')

	{{--	<script src="/vendor/chart.js/Chart.min.js"></script>
		<script src="/js/admin/demo/chart-area-demo.js"></script> --}}

		    <script>
		        $('#deleteModalRole').on('show.bs.modal', function (event) {
		            var button = $(event.relatedTarget) 
		            var rol_id = button.data('rolid') 
		            
		            var modal = $(this)
		            // modal.find('.modal-footer #user_id').val(user_id)
		            modal.find('form').attr('action','/roles/' + rol_id);
		        })
		    </script>

	@endsection

	@endsection