@extends('layouts.contenido')
@section('contenido')
    <!-- Botón para volver al inicio debajo de la cabecera -->
    <div class="d-flex justify-content-between mb-4">
        <a class="btn btn-secondary fw-bold" href="{{ route('inicio') }}">
            <i class="fas fa-arrow-left"></i> {{ __('idioma.Atras') }}
        </a>
        <a class="btn btn-info fw-bold" href="chatEntreno">
            <i class="fas fa-comments"></i> Presiona para una sugerencia hecha por IA
        </a>
    </div>
    <div class="container" style="max-width: 700px; margin-bottom: 140px;">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Buscador de entrenadores</span>
        </div>
        <div class="container">
            <div class="col-8">
                <div class="input-group">
                    <input type="text" class="form-control" id="texto" placeholder="Entrenador">
                    <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
                </div>
                <div id="resultados" class="bg-light border"></div>
            </div>
            <div class="col-8" id="contenedor"></div>
        </div>
    </div>

    <script type="text/javascript">
        window.addEventListener('load', function() {
            document.getElementById("texto").addEventListener("keyup", () => {
                if ((document.getElementById("texto").value.length) >= 1)
                    fetch('/entrenadoresapifetch?texto=' + document.getElementById("texto").value, {
                        method: 'get'
                    })
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById("resultados").innerHTML = html
                    })
                else
                    document.getElementById("resultados").innerHTML =
                    "<em style='font-size: 80%; padding: 1em;'>No hai resultados...</em>"
            });
        });
    </script>
@endsection
