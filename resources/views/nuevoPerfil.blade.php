@extends('layouts.contenido')
@section('contenido')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Edita tu perfil</h2>
            <a href="{{ route('perfil.show', $user->id) }}" class="btn btn-outline-primary btn-lg fw-bold mt-3">⬅
                Volver a Perfil</a>
            <form action="{{ route('perfil.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input name="name" type="text" class="form-control" id="name"
                        placeholder="Ejemplo: Sentadillas" value="{{ old('name', $user->name) }}">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!--Apellido-->
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input name="apellido" type="text" class="form-control" id="apellido"
                        value="{{ old('apellido', $perfil->apellido) }}">
                </div>
                @error('apellido')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!--Email-->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="email"
                        value="{{ old('email', $user->email) }}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!--Email-->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="password"
                        value="{{ old('password', $user->password) }}">
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Plan -->
                <div class="mb-3">
                    <label for="id_plan" class="form-label">Plan</label>
                    <select name="id_plan" id="id_plan" class="form-select">
                        <option value="">Selecciona un plan</option>
                        @foreach ($planes as $plan)
                            <option value="{{ $plan->id }}"
                                {{ old('plan', isset($plan) ? $plan->id : '') == $plan->id ? 'selected' : '' }}>
                                {{ $plan->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('id_plan')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!--Deporte-->
                <div class="form-group">
                    <label for="id_deporte">Deportes</label>
                    <div class="form-check">
                        @foreach ($deportes as $deporte)
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="id_deporte[]"
                                    value="{{ $deporte->id }}" @if ($user->deportes->contains($deporte->id)) checked @endif>
                                <label class="form-check-label" for="id_user">{{ $deporte->nombre }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                @error('id_deporte')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!-- Rol -->
                @if (auth()->user()->rol == 'admin')
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select name="rol" id="rol" class="form-select">
                            <option value="">Selecciona un rol</option>
                            <option value="admin" {{ old('rol', $user->rol) == 'admin' ? 'selected' : '' }}>Administrador
                            </option>
                            <option value="user" {{ old('rol', $user->rol) == 'user' ? 'selected' : '' }}>Usuario
                            </option>
                        </select>
                    </div>
                    @error('rol')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                @elseif(auth()->user()->rol == 'user')
                    <input type="text" name="rol" id="rol" class="form-select" value="{{ old('rol', $user->rol) }}">
                @endif


                <!--Teléfono-->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input name="telefono" type="text" class="form-control" id="telefono"
                        value="{{ old('telefono', $perfil->telefono) }}">
                </div>
                @error('telefono')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <!--Dirección-->
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input name="direccion" type="text" class="form-control" id="direccion"
                        value="{{ old('direccion', $perfil->direccion) }}">
                </div>
                @error('direccion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!--Dirección-->
                <div class="mb-3">
                    <label for="hobby" class="form-label">Hobby</label>
                    <input name="hobby" type="text" class="form-control" id="hobby"
                        value="{{ old('hobby', $perfil->hobby) }}">
                </div>
                @error('hobby')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- Botones -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary w-100 me-2 fw-bold">📋 Enviar</button>
                    @if (auth()->user()->rol == 'user')
                        <a class="btn btn-danger w-100 fw-bold" href="{{ route('perfil.show', $user->id) }}">🗑️
                            Eliminar</a>
                    @else
                        <a class="btn btn-danger w-100 fw-bold" href="{{ route('perfiles') }}">🗑️
                            Eliminar</a>
                    @endif
                </div>

            </form>
        </div>
    </div>
@endsection
