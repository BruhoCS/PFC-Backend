@extends('layouts.contenido')

@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <!-- Cabecera con fondo degradado -->
                <div class="card-header text-white text-center py-4" style="background: linear-gradient(135deg, #007bff, #6610f2);">
                    <h3 class="fw-bold mb-0">Perfil de Usuario</h3>
                </div>
                <div class="card-body text-center p-5">
                    <!-- Información del usuario -->
                    <h4 class="fw-bold mb-1">{{ $user->name }}</h4>
                    <p class="text-muted mb-3">{{ $perfil->apellido }}</p>
                    <p class="text-muted mb-3">{{ $user->email }}</p>
                    <div class="d-flex justify-content-center flex-wrap">
                        <p class="me-3"><i class="fas fa-envelope text-primary"></i> {{ $user->plan->nombre }}</p>
                        <p class="me-3"><i class="fas fa-phone text-success"></i> {{ $perfil->telefono }}</p>
                        <p class="me-3"><i class="fas fa-map-marker-alt text-danger"></i> {{ $perfil->direccion }}</p>
                        <p><i class="fas fa-heart text-warning"></i> {{ $perfil->hobby }}</p>
                    </div>

                    <!-- Cuadro de deportes -->
                    <div class="card mt-4 border-info">
                        <div class="card-header text-center bg-info text-white">
                            <h5 class="mb-0">Deportes en los que participas</h5>
                        </div>
                        <div class="card-body">
                            @if($user->deportes->isEmpty())
                                <p class="text-muted">No estás inscrito en ningún deporte.</p>
                            @else
                                <ul class="list-group">
                                    @foreach($user->deportes as $deporte)
                                        <li class="list-group-item">{{ $deporte->nombre }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    <!-- Botón para editar perfil -->
                    <a href="{{ route('perfil.edit', $user->id) }}" class="btn btn-warning mt-3 px-4">
                        <i class="fas fa-edit"></i> Editar Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
