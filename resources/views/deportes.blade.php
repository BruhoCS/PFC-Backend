@extends('layouts.contenido')
@section('contenido')
    <!-- Sección de deportes -->
    <section class="deportes mt-5">
        <div class="container">
            <!-- Botón de vuelta al inicio -->
            <div class="text-left mt-4 mb-2">
                <a href="{{ route('inicio') }}" class="btn btn-secondary">{{__("idioma.Atras")}}</a>
            </div>
            <!-- Botón para añadir un nuevo deporte en caso de ser admin-->
            @if (auth()->user()->rol == 'admin')
                <a href="{{ route('deporte.create') }}" class="btn btn-primary ">{{__("idioma.Añadir Deporte")}}</a>
            @endif
            <h2 class="text-center mb-4">{{__("idioma.Nuestros Deportes")}}</h2>

            <div class="row">
                @foreach ($deportes as $deporte)
                    <!-- Contenedor del deporte -->
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm p-3 rounded-3">
                            <!--Nombre del deporte-->
                            <h3 class="text-center">{{ $deporte->nombre }}</h3>
                            <!--Nombre del entrenador-->
                            <p>Entrenador: {{ $deporte->entrenador->nombre }}</p>
                            <!--Nivel del deporte-->
                            <p>Nivel: {{ $deporte->nivel}}</p>
                            <!-- Dia de las clase -->
                            <p>Dia de clase: {{ $deporte->dia}}</p>
                            <!--Descripcion del deporte-->
                            <p>{{ $deporte->descripcion }}</p>
                            <!--Botón del deporte-->
                            <a href="" class="btn btn-primary d-block text-center mb-2">Inscribirse</a>
                            <!--En caso de que sea admin tendra la opción de editar o borrar el deporte-->
                            @if (auth()->user()->rol == 'admin')
                                <a href="{{ route('deporte.edit', $deporte->id) }}"
                                    class="btn btn-warning d-block text-center mb-2">{{__("idioma.Editar")}}</a>
                                <a href="{{ route('deporte.destroy', $deporte->id) }}"
                                    class="btn btn-danger d-block text-center">{{__("idioma.Borrar")}}</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
