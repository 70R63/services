@extends('app')

@section('content')

<h3>Crear nuevo usuario</h3>

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

<form method="POST" action="/users" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nombre de usuario <span class="tx-danger">*</span></span>
        </div>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ old('name') }}" required>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Email <span class="tx-danger">*</span></span>
        </div>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}" required>
    </div>

     <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Contraseña <span class="tx-danger">*</span></span>
        </div>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password..." required minlength="8">
    </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Confirmar Contraseña <span class="tx-danger">*</span></span>
        </div>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
    </div>

    <div class="form-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Selecionar Rol <span class="tx-danger">*</span></span>
        </div>
         <select class="form-control" name="role" id="role">
            <option value="">Seleccionar Rol...</option>
                @foreach ($roles as $role)
                    <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
        </select> 
    </div>
    
    <div class="form-group mb-3">
        <div id="permissions_box" >
           <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Permisos del rol<span class="tx-danger">*</span></span>
            </div>
            <div id="permissions_ckeckbox_list">
            </div> 
        </div>   
    </div>  

    <div class="form-group pt-2">
        <input class="btn btn-success" type="submit" value="Crear">
        <a href="{{ url()->previous() }}" class="btn btn-info">Volver</a>
    </div>
</form>    

@section('js_user_page')

    <script>
        $(document).ready(function(){
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
            permissions_box.hide(); // hide all boxes
            $('#role').on('change', function() {
                var role = $(this).find(':selected');    
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');
              //  console.log(role_id);
                permissions_ckeckbox_list.empty();

                $.ajax({
                    url: "/users/create",
                    method: 'get',
                    dataType: 'json',
                    data: { 
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {
                    
                    console.log(data);
                   
                    permissions_box.show();                        
                    // permissions_ckeckbox_list.empty();
                     $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(       
                            '<div class="custom-control custom-checkbox">'+                         
                                '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                            '</div>'
                        );
                    }); 
                });
            });
        });
    </script>

@endsection


@endsection