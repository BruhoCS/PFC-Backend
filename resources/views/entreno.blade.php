@extends('layouts.contenido')
@section('contenido')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Configura tu Entreno</h2>
            <a href="{{ route('entrenos') }}" class="btn btn-outline-primary btn-lg fw-bold mt-3">⬅ Volver a Entrenos</a>
            <form action="{{ route('entreno.update', $entreno->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!--Guardaremos el usuario si es admin podrá cambiar el usuario al que le pertenece el entreno-->
                @if (auth()->user()->rol == 'admin')
                <label for="id_user">Entrenador: </label>
                <select name="id_user" id="id_user" class="form-select">
                    <option value="">Selecciona un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" 
                            {{ old('usuario', isset($usuario) ? $usuario->id : '') == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->name }}
                        </option>
                    @endforeach
                </select>
                    <!--ID del usuario si no es admin no habrá la posibilidad de cambiar de usuario-->
                @else
                    <input hidden name="id_user" type="text" value="{{ $entreno->id_user }}">
                @endif
                <!-- Día de la Semana -->
                <div class="mb-3">
                    <label for="dia" class="form-label">Día de la Semana</label>
                    <select name="dia" id="escribirDia" class="form-select">
                        <option value="">Selecciona el día</option>
                        <option value="Lunes" {{ old('dia', $entreno->dia) == 'Lunes' ? 'selected' : '' }}>Lunes
                        </option>
                        <option value="Martes" {{ old('dia', $entreno->dia) == 'Martes' ? 'selected' : '' }}>Martes
                        </option>
                        <option value="Miércoles" {{ old('dia', $entreno->dia) == 'Miércoles' ? 'selected' : '' }}>
                            Miércoles</option>
                        <option value="Jueves" {{ old('dia', $entreno->dia) == 'Jueves' ? 'selected' : '' }}>Jueves
                        </option>
                        <option value="Viernes" {{ old('dia', $entreno->dia) == 'Viernes' ? 'selected' : '' }}>
                            Viernes</option>
                        <option value="Sábado" {{ old('dia', $entreno->dia) == 'Sábado' ? 'selected' : '' }}>Sábado
                        </option>
                        <option value="Domingo" {{ old('dia', $entreno->dia) == 'Domingo' ? 'selected' : '' }}>
                            Domingo</option>
                    </select>
                </div>
                @error('dia')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Grupo Muscular -->
                <div class="mb-3">
                    <label for="grupo_muscular" class="form-label">Grupo Muscular</label>
                    <select name="grupo_muscular" id="grupo_muscular" class="form-select">
                        <option value="">Selecciona el grupo</option>
                        <option value="Tren Superior"
                            {{ old('grupo_muscular', $entreno->grupo_muscular) == 'Tren Superior' ? 'selected' : '' }}>Tren
                            Superior</option>
                        <option value="Tren Inferior"
                            {{ old('grupo_muscular', $entreno->grupo_muscular) == 'Tren Inferior' ? 'selected' : '' }}>Tren
                            Inferior</option>
                        <option value="Core"
                            {{ old('grupo_muscular', $entreno->grupo_muscular) == 'Core' ? 'selected' : '' }}>Core</option>
                    </select>
                </div>
                @error('grupo_muscular')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Ejercicio -->
                <div class="mb-3">
                    <label for="ejercicio" class="form-label">Ejercicio</label>
                    <input name="ejercicio" type="text" class="form-control" id="ejercicio"
                        placeholder="Ejemplo: Sentadillas" value="{{ old('ejercicio', $entreno->ejercicio) }}">
                </div>
                @error('ejercicio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Repeticiones -->
                <div class="mb-3">
                    <label for="repeticiones" class="form-label">Repeticiones</label>
                    <select name="repeticiones" id="repeticion" class="form-select">
                        <option value="">Selecciona</option>
                        <option value="6" {{ old('repeticiones', $entreno->repeticiones) == '6' ? 'selected' : '' }}>6
                        </option>
                        <option value="8" {{ old('repeticiones', $entreno->repeticiones) == '8' ? 'selected' : '' }}>8
                        </option>
                        <option value="10" {{ old('repeticiones', $entreno->repeticiones) == '10' ? 'selected' : '' }}>
                            10</option>
                        <option value="12" {{ old('repeticiones', $entreno->repeticiones) == '12' ? 'selected' : '' }}>
                            12</option>
                        <option value="15" {{ old('repeticiones', $entreno->repeticiones) == '15' ? 'selected' : '' }}>
                            15</option>
                        <option value="20" {{ old('repeticiones', $entreno->repeticiones) == '20' ? 'selected' : '' }}>
                            20</option>
                    </select>
                </div>
                @error('repeticiones')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Duración -->
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración (min)</label>
                    <input name="duracion" type="text" class="form-control" id="duracion"
                        placeholder="Ejemplo: 45 minutos" value="{{ old('duracion', $entreno->duracion) }}">
                </div>
                @error('duracion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Tipo de Entreno -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de Entreno</label>
                    <select name="tipo" id="tipo" class="form-select">
                        <option value="">Selecciona el tipo</option>
                        <option value="Fuerza" {{ old('tipo', $entreno->tipo) == 'Fuerza' ? 'selected' : '' }}>Fuerza
                        </option>
                        <option value="Resistencia" {{ old('tipo', $entreno->tipo) == 'Resistencia' ? 'selected' : '' }}>
                            Resistencia</option>
                        <option value="Velocidad" {{ old('tipo', $entreno->tipo) == 'Velocidad' ? 'selected' : '' }}>
                            Velocidad</option>
                        <option value="Potencia" {{ old('tipo', $entreno->tipo) == 'Potencia' ? 'selected' : '' }}>Potencia
                        </option>
                        <option value="Cardiovascular"
                            {{ old('tipo', $entreno->tipo) == 'Cardiovascular' ? 'selected' : '' }}>Cardiovascular</option>
                    </select>
                </div>
                @error('tipo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- Descanso -->
                <div class="mb-3">
                    <label for="descanso" class="form-label">Descanso (min)</label>
                    <select name="descanso" id="descanso" class="form-select">
                        <option value="">Selecciona</option>
                        <option value="1min" {{ old('descanso', $entreno->descanso) == '1min' ? 'selected' : '' }}>1min
                        </option>
                        <option value="2min" {{ old('descanso', $entreno->descanso) == '2min' ? 'selected' : '' }}>2min
                        </option>
                        <option value="3min" {{ old('descanso', $entreno->descanso) == '3min' ? 'selected' : '' }}>3min
                        </option>
                        <option value="4min" {{ old('descanso', $entreno->descanso) == '4min' ? 'selected' : '' }}>4min
                        </option>
                        <option value="5min" {{ old('descanso', $entreno->descanso) == '5min' ? 'selected' : '' }}>5min
                        </option>
                    </select>
                </div>
                @error('descanso')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Botones -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary w-100 me-2 fw-bold">📋 Enviar</button>
                    <a class="btn btn-danger w-100 fw-bold" href="{{ route('entrenos') }}">🗑️ Eliminar</a>
                </div>

            </form>
        </div>
    </div>
@endsection
