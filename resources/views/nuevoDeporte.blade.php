@extends('layouts.contenido')
@section('contenido')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Crear un deporte</h2>

            <!-- Botón para volver -->
            <a href="{{ route('deportes') }}" class="btn btn-outline-primary btn-lg fw-bold mb-3">⬅ Volver a Deportes</a>

            <form action="{{ route('deporte.store') }}" method="POST">
                @csrf
                @method('POST')

               <!-- Nombre -->
               <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required
                    value="{{ old('nombre', $deportes->nombre) }}">
            </div>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!--Entrenador --->
            <label for="id_entrenador">Entrenador: </label>
            <select name="id_entrenador" id="id_entrenador" class="form-select">
                <option value="">Selecciona un entrenador</option>
                @foreach ($entrenadores as $entrenador)
                    <option value="{{ $entrenador->id }}"
                        {{ old('entrenador', isset($deportes) ? $deportes->id_entrenador : '') == $entrenador->id ? 'selected' : '' }}>
                        {{ $entrenador->nombre }}
                    </option>
                @endforeach
            </select>
            @error('entrenador')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!--Usuarios-->
            <div class="form-group">
                <label for="id_user">Usuarios</label>
                <div class="form-check">
                    @foreach ($users as $user)
                        <div class="form-check-inline">
                            <input type="checkbox" class="form-check-input" name="id_user[]" value="{{ $user->id }}"
                                @if ($deportes->usuarios->contains($user->id)) checked @endif>
                            <label class="form-check-label" for="id_user">{{ $user->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            @error('id_user')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="text" name="precio" class="form-control" required
                    value="{{ old('precio', $deportes->precio) }}">
            </div>
            @error('precio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Día -->
            <div class="mb-3">
                <label for="dia" class="form-label">Día</label>
                <select name="dia" id="escribirDia" class="form-select">
                    <option value="">Selecciona el día</option>
                    <option value="Lunes" {{ old('dia', $deportes->dia) == 'Lunes' ? 'selected' : '' }}>Lunes
                    </option>
                    <option value="Martes" {{ old('dia', $deportes->dia) == 'Martes' ? 'selected' : '' }}>Martes
                    </option>
                    <option value="Miércoles" {{ old('dia', $deportes->dia) == 'Miércoles' ? 'selected' : '' }}>
                        Miércoles</option>
                    <option value="Jueves" {{ old('dia', $deportes->dia) == 'Jueves' ? 'selected' : '' }}>Jueves
                    </option>
                    <option value="Viernes" {{ old('dia', $deportes->dia) == 'Viernes' ? 'selected' : '' }}>
                        Viernes</option>
                    <option value="Sábado" {{ old('dia', $deportes->dia) == 'Sábado' ? 'selected' : '' }}>Sábado
                    </option>
                    <option value="Domingo" {{ old('dia', $deportes->dia) == 'Domingo' ? 'selected' : '' }}>
                        Domingo</option>
                </select>
            </div>
            @error('dia')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $deportes->descripcion) }}</textarea>
            </div>
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Nivel -->
            <div class="mb-3">
                <label for="nivel" class="form-label">Nivel</label>
                <select name="nivel" id="nivel" class="form-select" required>
                    <option value="">Selecciona</option>
                    <option value="Novato" {{ old('nivel', $deportes->nivel) == 'Novato' ? 'selected' : '' }}>Novato
                    </option>
                    <option value="Intermedio" {{ old('nivel', $deportes->nivel) == 'Intermedio' ? 'selected' : '' }}>
                        Intermedio</option>
                    <option value="Experto" {{ old('nivel', $deportes->nivel) == 'Experto' ? 'selected' : '' }}>Experto
                    </option>
                </select>
            </div>
            @error('nivel')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Duración -->
            <div class="mb-3">
                <label for="duracion" class="form-label">Duración (minutos)</label>
                <input type="number" name="duracion" class="form-control" required
                    value="{{ old('duracion', $deportes->duracion) }}">
            </div>
            @error('duracion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Botones -->
            <div class="d-flex gap-3 mt-4">
                <button type="submit" class="btn btn-primary w-100 fw-bold">📋 Enviar</button>
                <a href="{{ route('deportes') }}" class="btn btn-danger w-100 fw-bold">🗑️ Cancelar</a>
            </div>

            </form>
        </div>
    </div>
@endsection
