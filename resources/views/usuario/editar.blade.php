@extends('app')
@section('content')


<h2>Edicion de usuarios</h2>

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

<form method="POST" action="/users/{{ $users->id }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf()
    
    <div class="form-group">
        <label for="name">Usuario</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ $users->name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ $users->email }}">
    </div>
    <div class="form-group">
        <label for="password">Nueva contraseña</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password..." minlength="8">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
    </div>
    
    <div class="form-group pt-2">
        <input class="btn btn-success" type="submit" value="Submit">
        <a href="{{ url()->previous() }}" class="btn btn-info">Volver</a>
    </div>
</form>

@endsection