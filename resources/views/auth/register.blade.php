@extends('layouts.contenido')

@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Registro</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @error('name') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Apellido -->
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required>
                @error('apellido') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required>
                @error('telefono') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required>
                @error('direccion') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Hobby -->
            <div class="mb-3">
                <label for="hobby" class="form-label">Hobby</label>
                <input id="hobby" type="text" class="form-control" name="hobby" value="{{ old('hobby') }}" required>
                @error('hobby') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @error('password') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                @error('password_confirmation') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!--Plan-->
            <div class="mb-3">
                <label for="id_plan" class=form-label>Plan</label>
                <select  name="id_plan" id="id_plan" class="form-select" required>
                    <option value="1" selected>Dain</option>
                    <option value="2">Fenrir</option>
                </select>
                @error('id_plan') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Rol -->
            <div class="mb-3">
                <select hidden name="rol" id="rol" class="form-select" required>
                    <option value="user" selected>Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
                @error('rol') <div class="alert alert-danger mt-2">{{ $message }}</div> @enderror
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between mt-4">
                <a class="text-decoration-none" href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
                <button type="submit" class="btn btn-primary fw-bold">📋 Registrarse</button>
            </div>
        </form>
    </div>
</div>
@endsection
