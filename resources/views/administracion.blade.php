@extends('layouts.contenido')
@section('contenido')
    <div class="container mt-5">
        <!-- Botón para volver al inicio -->
        <div class="mb-4">
            <a class="btn btn-secondary fw-bold" href="{{ route('inicio') }}">
                <i class="fas fa-arrow-left"></i>{{ __('idioma.Atras') }}
            </a>
        </div>
        <div class="row justify-content-center">
            <!-- Tarjeta de Usuarios -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header text-center"
                        style="background: linear-gradient(135deg, #007bff, #6610f2); color: white;">
                        <h4 class="fw-bold mb-0">Usuarios</h4>
                    </div>
                    <div class="card-body text-center">
                        <p class="text-muted mb-4">Gestiona todos los usuarios registrados en el sistema.</p>
                        <a href="{{ route('perfiles') }}" class="btn btn-primary w-100">Ver Usuarios</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Entrenadores -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header text-center"
                        style="background: linear-gradient(135deg, #28a745, #218838); color: white;">
                        <h4 class="fw-bold mb-0">Entrenadores</h4>
                    </div>
                    <div class="card-body text-center">
                        <p class="text-muted mb-4">Gestiona a los entrenadores disponibles para los entrenamientos.</p>
                        <a href="{{ route('entrenadores') }}" class="btn btn-success w-100">Ver Entrenadores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
