@extends('layouts.contenido')
@section('contenido')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Edita Entrenador</h2>
            <a href="{{ route('entrenadores') }}" class="btn btn-outline-primary btn-lg fw-bold mt-3">⬅
                Volver</a>
            <form action="{{ route('entrenador.update',$entrenador->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" class="form-control" id="nombre"
                        value="{{ old('nombre', $entrenador->nombre) }}">
                </div>
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!--Apellido-->
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input name="apellido" type="text" class="form-control" id="apellido"
                        value="{{ old('nombre', $entrenador->apellido) }}">
                </div>
                @error('apellido')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!--Email-->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="email"
                        value="{{ old('email', $entrenador->email) }}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!--Teléfono-->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input name="telefono" type="text" class="form-control" id="telefono"
                        value="{{ old('telefono', $entrenador->telefono) }}">
                </div>
                @error('telefono')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!--Dirección-->
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input name="direccion" type="text" class="form-control" id="direccion"
                        value="{{ old('direccion', $entrenador->direccion) }}">
                </div>
                @error('direccion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- Botones -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary w-100 me-2 fw-bold">📋 Enviar</button>
                    <a class="btn btn-danger w-100 fw-bold" href="{{ route('entrenadores') }}">🗑️
                        Eliminar</a>
                </div>

            </form>
        </div>
    </div>
@endsection
