@extends('layouts.contenido')
@section('contenido')
    <div class="container mt-5">
        <!-- Botón para volver al inicio debajo de la cabecera -->
        <div class="d-flex justify-content-between mb-4">
            <a class="btn btn-secondary fw-bold" href="{{ route('inicio') }}">
                <i class="fas fa-arrow-left"></i> {{__("idioma.Atras")}}
            </a>
            <a class="btn btn-info fw-bold" href="chatEntreno">
                <i class="fas fa-comments"></i> Presiona para una sugerencia hecha por IA
            </a>
        </div>
        
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">{{__("idioma.Entreno Manual")}}</h2>

            <a class="btn btn-primary btn-lg fw-bold mb-3" href="{{ route('entreno.create') }}">
                <i class="fas fa-plus"></i> {{__("idioma.Añadir Entreno")}}
            </a>

            <div id="entrenoPersona">
                <div id="nota">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>{{__("idioma.Día")}}</th>
                                <th>{{__("idioma.Grupo Muscular")}}</th>
                                <th>{{__("idioma.Ejercicio")}}</th>
                                <th>{{__("idioma.Repeticiones")}}</th>
                                <th>{{__("idioma.Duración")}}</th>
                                <th>{{__("Tipo")}}</th>
                                <th>{{__("idioma.Descanso")}}</th>
                                <th>{{__("idioma.Usuario")}}</th>
                                <th>{{__("idioma.Acciones")}}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($entrenos as $entreno)
                                <tr>
                                    <td>{{ $entreno->dia }}</td>
                                    <td>{{ $entreno->grupo_muscular }}</td>
                                    <td>{{ $entreno->ejercicio }}</td>
                                    <td>{{ $entreno->repeticiones }}</td>
                                    <td>{{ $entreno->duracion }}</td>
                                    <td>{{ $entreno->tipo }}</td>
                                    <td>{{ $entreno->descanso }}</td>
                                    <td>{{ $entreno->usuario->name }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('entreno.edit', $entreno->id) }}">{{__("idioma.Editar")}}</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('entreno.destroy', $entreno->id) }}">{{__("idioma.Borrar")}}</a>
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
