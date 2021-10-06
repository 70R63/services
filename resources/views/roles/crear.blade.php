@extends('app')

@section('content')

<div class="row row-sm">
   <div class="col-sm-12 col-md-12">
      <div class="card custom-card ">
         <div class="card-header border-bottom-0 custom-card-header">
            <div class="col-sm-12 col-md-10">
                <h3 class="main-content-label mb-0">Crear nuevo rol</h3>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="/roles" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">Nombre de rol <span class="tx-danger">*</span></span>
                  </div>
                  <input type="text" name="rol_name" class="form-control" id="rol_name" placeholder="Name..." value="{{ old('rol_name') }}" required>
               </div>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">Slug <span class="tx-danger">*</span></span>
                  </div>
                  <input type="text" name="rol_slug" class="form-control" id="rol_slug" readonly placeholder="Slug..." value="{{ old('rol_slug') }}" required>
               </div>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1">Permisos <span class="tx-danger">*</span></span>
                  </div>
                  <input type="text" data-role="tagsinput" name="roles_permisos" class="form-control" id="roles_permisos" value="{{ old('roles_permisos')}}">
               </div>
               <div id="permissions_box" >
                  {{-- <label for="roles">Select Permissions</label>
                  <div id="permissions_ckeckbox_list">
                  </div>
                  --}}
               </div>
               <br>
               <div class="form-group pt-2">
                  <input class="btn btn-success" type="submit" value="Crear">
                  <a href="{{route('roles.index')}}" class="btn btn-info">Inicio</a>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@section('css_rol_page')
    <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">

@endsection

@section('js_rol_page')
    <script src="/js/bootstrap-tagsinput.js"></script>

    <script>
        $(document).ready(function(){
            $('#rol_name').keyup(function(e){
                var str = $('#rol_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//reemplazar espacios en blanco con "-"
                $('#rol_slug').val(str);
                $('#rol_slug').attr('placeholder', str);
            });
        });
        
    </script>

@endsection


@endsection