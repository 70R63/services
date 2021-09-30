@extends('app')

@section('content')

<h3>Crear nuevo rol</h3>

<!-- Mostrar errores de la validación de los campos del formulario -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Mostrar errores -->

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

    <div class="form-group  mb-3">
        <label for="role">Selecionar Rol</label>

        {{-- <select class="role form-control" name="role" id="role">
            <option value="">Select Role...</option>
            @foreach ($roles as $rol)
            <option data-role-id="{{$rol->id}}" data-role-slug="{{$rol->slug}}" value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
        </select> --}}
    </div>
    
    <div id="permissions_box" >
       {{-- <label for="roles">Select Permissions</label>
        <div id="permissions_ckeckbox_list">
        </div> --}}
    </div>     

    <div class="form-group pt-2">
        <input class="btn btn-success" type="submit" value="Crear">
        <a href="{{route('roles.index')}}" class="btn btn-info">Inicio</a>
    </div>
</form>    

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