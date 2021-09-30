@extends('app')
@section('content')


<h2>Edicion de roles</h2>

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

{!! Form::model($roles, ['route' => ['roles.update', $roles->id]]) !!}
    {!! Form::hidden('_method', 'put') !!}
  @csrf()
    
    <div class="form-group">
        <label for="name">Rol</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ $roles->name }}" required>
    </div>
    <div class="form-group">
        <label for="slug">Rol Slug</label>
        <input type="text" name="slug" class="form-control" id="slug" readonly placeholder="Slug..." value="{{ $roles->slug }}">
    </div>  

    <div class="form-group">
        <label for="roles_permisos">Agregar permisos</label>
        <input type="text" data-role="tagsinput" name="roles_permisos" class="form-control" id="roles_permisos"  value="@foreach ($roles->permisos as $permiso)
            {{$permiso->name. ','}}
        @endforeach">  
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-success" type="submit" value="Enviar">
        <a href="{{route('roles.index')}}" class="btn btn-info">Inicio</a>
    </div>
{!!Form::close()!!}

@section('css_rol_page')
    <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">

@endsection

@section('js_rol_page')
    <script src="/js/bootstrap-tagsinput.js"></script>

    <script>
        $(document).ready(function(){
            $('#name').keyup(function(e){
                var str = $('#name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//reemplazar espacios en blanco con "-"
                $('#slug').val(str);
                $('#slug').attr('placeholder', str);
            });
        });
        
    </script>

@endsection

@endsection