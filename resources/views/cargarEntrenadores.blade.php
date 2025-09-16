@extends('layouts.contenido')
@section('contenido')
    <div id="load" style="table table-bordered">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="col">Nombre</th>
                    <th class="col">Apellido</th>
                    <th class="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entrenadores as $entrenador)
                    <tr>
                        <td>{{ $entrenador->nombre }}</td>
                        <td>{{ $entrenador->apellido }}</td>
                        <td>{{ $entrenador->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $entrenadores->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
