@extends('layouts.contenido')
@section('contenido')
    <div class="container mt-5">
        <!-- Botón para volver al inicio -->
        <div class="mb-4">
            <a class="btn btn-secondary fw-bold" href="{{ route('administracion') }}">
                <i class="fas fa-arrow-left"></i>{{ __('idioma.Atras') }}
            </a>
        </div>

        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Usuarios</h2>

            <a class="btn btn-primary btn-lg fw-bold mb-3" href="{{ route('perfil.create') }}">
                <i class="fas fa-plus"></i> Añadir usuario
            </a>

            <div id="entrenoPersona">
                <div id="nota">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Telefono</th>
                                <th>Dirección</th>
                                <th>Hobby</th>
                                <th>{{ __('idioma.Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($perfiles as $perfil)
                                    <tr>
                                        <td>{{ $perfil->usuario->name }}</td>
                                        <td>{{ $perfil->apellido }}</td>
                                        <td>{{ $perfil->usuario->email }}</td>
                                        <td>{{ $perfil->usuario->rol }}</td>
                                        <td>{{ $perfil->telefono }}</td>
                                        <td>{{ $perfil->direccion }}</td>
                                        <td>{{ $perfil->hobby }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('perfil.edit', $perfil->id) }}">{{ __('idioma.Editar') }}</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('perfil.destroy', $perfil->id) }}">{{ __('idioma.Borrar') }}</a>
                                        </td>
                                    </tr>         
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
