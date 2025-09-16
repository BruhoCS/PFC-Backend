@extends('layouts.contenido')
@section('contenido')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Configura tu Entreno</h2>
            <a href="{{ route('entrenos') }}" class="btn btn-outline-primary btn-lg fw-bold mt-3">⬅ Volver a Entrenos</a>
            <form action="{{ route('entreno.store') }}" method="POST">
                @csrf

                <!--Guardaremos el usuario si es admin podrá cambiar el usuario al que le pertenece el entreno-->
                @if (auth()->user()->rol == 'admin')
                    <label for="id_user">Usuario: </label>
                    <select name="id_user" id="id_user" class="form-select">
                        <option value="">Selecciona un usuario</option>
                        @foreach ($users as $usuario)
                            <option value="{{ $usuario->id }}">
                                {{ $usuario->name }}
                            </option>
                        @endforeach
                    </select>
                    <!--ID del usuario si no es admin no habrá la posibilidad de cambiar de usuario-->
                @else
                    <input hidden name="id_user" type="text" value="{{ auth()->user()->id }}">
                @endif
                @error('id_user')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- Día de la Semana -->
                <div class="mb-3">
                    <label for="dia" class="form-label">Día de la Semana</label>
                    <select name="dia" id="dia" class="form-select">
                        <option value="">Selecciona el día</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sábado">Sábado</option>
                        <option value="Domingo">Domingo</option>
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
                        <option value="Tren Superior">Tren Superior</option>
                        <option value="Tren Inferior">Tren Inferior</option>
                        <option value="Core">Core</option>
                    </select>
                </div>
                @error('grupo_muscular')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Ejercicio -->
                <div class="mb-3">
                    <label for="ejercicio" class="form-label">Ejercicio</label>
                    <input name="ejercicio" type="text" class="form-control" id="escribirEjercicios"
                        placeholder="Ejemplo: Sentadillas">
                </div>
                @error('ejercicio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Repeticiones -->
                <div class="mb-3">
                    <label for="repeticiones" class="form-label">Repeticiones</label>
                    <select name="repeticiones" id="repeticiones" class="form-select">
                        <option value="">Selecciona</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                        <option value="10">10</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
                @error('repeticiones')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Duración -->
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración (min)</label>
                    <input name="duracion" type="text" class="form-control" id="duracion"
                        placeholder="Ejemplo: 45 minutos" formControlName="duracion">
                </div>
                @error('duracion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Tipo de Entreno -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de Entreno</label>
                    <select name="tipo" id="tipo" class="form-select" formControlName="tipo">
                        <option value="">Selecciona el tipo</option>
                        <option value="Fuerza">Fuerza</option>
                        <option value="Resistencia">Resistencia</option>
                        <option value="Velocidad">Velocidad</option>
                        <option value="Potencia">Potencia</option>
                        <option value="Cardiovascular">Cardiovascular</option>
                    </select>
                </div>
                @error('tipo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Descanso -->
                <div class="mb-3">
                    <label for="descanso" class="form-label">Descanso (min)</label>
                    <select name="descanso" id="descanso" class="form-select" formControlName="descanso">
                        <option value="">Selecciona</option>
                        <option value="uno">1 min</option>
                        <option value="dos">2 min</option>
                        <option value="tres">3 min</option>
                        <option value="cuatro">4 min</option>
                        <option value="cinco">5 min</option>
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
