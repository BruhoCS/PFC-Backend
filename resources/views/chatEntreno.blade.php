@extends('layouts.contenido')
@section('contenido')
<div class="container mt-5">
    <!-- Título con estilo -->
    <h1 class="text-center text-primary fw-bold">🏋️ Entreno Sugerido por la IA</h1>

    <!-- Botón de regreso -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a class="btn btn-secondary fw-bold" href="{{ route('entrenos') }}">
            <i class="fas fa-arrow-left"></i> {{ __("idioma.Atras") }}
        </a>
    </div>

    <!-- Tarjeta con la respuesta de la IA -->
    <div class="card shadow-lg p-4">
        <h4 class="text-center text-success fw-bold mb-3">📋 Rutina Recomendada</h4>

        <div class="list-group">
            <!--Comprobamos que hay respuesta-->
            @if ($respuestas !== null)
                @foreach ($respuestas as $respuesta)
                    <div class="list-group-item list-group-item-action">
                        {{ $respuesta }}
                    </div>
                @endforeach
                <!--Si no la hay-->
            @else
            <!--Aviso de que no hay respuesta-->
                <div class="alert alert-warning text-center" role="alert">
                    No hay sugerencia disponible en este momento.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
