@extends('layouts.contenido')
@section('contenido')

<!-- Datos de interés para el usuario -->
<section class="container my-5">
    <div class="row">
        <!-- Tarjeta Comunidad -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="{{ asset("media/img/ContenidoInicio/tarjetas/tarjetaComunidad.jpg")}}" class="card-img-top" alt="Imagen de la comunidad del GYM">
                <div class="card-body">
                    <h5 class="card-title">{{__("idioma.Comunidad")}}</h5>
                    <p class="card-text">
                        {{__("idioma.En nuestra comunidad del gym, nos apoyamos mutuamente para alcanzar nuestras metas. ¡Juntos somos más fuertes, saludables y motivados!")}}
                    </p>
                </div>
            </div>
        </div>

        <!-- Tarjeta Noticias -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="{{ asset("media/img/ContenidoInicio/tarjetas/tarjetaNoticias.jpg")}}" class="card-img-top" alt="Noticias del gimnasio">
                <div class="card-body">
                    <h5 class="card-title">{{__("idioma.Noticias")}}</h5>
                    <p class="card-text">
                        {{__("idioma.¡Gran noticia! Nueva sala de entrenamiento funcional con equipos de última generación. ¡Ven a probarla hoy!")}}
                    </p>
                </div>
            </div>
        </div>

        <!-- Tarjeta Ofertas -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="{{ asset("media/img/ContenidoInicio/tarjetas/tarjetaProductos.jpg")}}" class="card-img-top" alt="Oferta del momento">
                <div class="card-body">
                    <h5 class="card-title">{{__("idioma.Ofertas")}}</h5>
                    <p class="card-text">
                        {{__("idioma.¡50% de descuento en tu primera mensualidad si te inscribes este mes! ¡No dejes pasar esta oportunidad!")}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ubicación del Gimnasio -->
<section class="container my-5 text-center">
    <h2>{{__("idioma.¿Dónde puedes encontrarnos?")}}</h2>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2433.361005790835!2d-8.246963414052113!3d43.50712879138837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2dd896784ea515%3A0x57bb4d32efd82f79!2sSantuario%20de%20Nosa%20Se%C3%B1ora%20de%20Chamorro%2C%20CP-3601%2C%20299%2C%2015405%20Ferrol%2C%20La%20Coru%C3%B1a!5e0!3m2!1ses!2ses!4v1731845250444!5m2!1ses!2ses"
            width="100%" height="450" style="border: 0;" allowfullscreen loading="lazy">
        </iframe>
    </div>
</section>

<!-- Deportes disponibles -->
<section class="container my-5">
    <h2 class="text-center mb-4">{{__("idioma.Deportes de nuestro gimnasio")}}</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 text-center mb-4">
            <div class="card shadow-sm border-light">
                <img src="{{ asset('media/img/ContenidoInicio/deportes/Actividades_jiu-jitsu.jpg') }}" class="card-img-top rounded" alt="Imagen sobre Jiu-Jitsu">
                <div class="card-body">
                    <h4 class="card-title">{{__("idioma.¡Inscríbete en uno de nuestros deportes!")}}</h4>
                    <p class="card-text">{{__("idioma.Apúntate ahora y entrena junto a tus compañeros con nuestro entrenador más cualificado.")}}</p>
                    <a href="{{ route('deportes') }}" class="btn btn-primary mb-2 me-2">{{__("idioma.Ir a deportes")}}</a>
                    <a href="{{ route('paginarEntrenadores') }}" class="btn btn-primary mb-2 me-2">Ver entrenadores</a>
                    <a href="{{ route('verentrenadoresapifetch') }}" class="btn btn-primary mb-2">Buscar entrenadores</a>                    
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Información sobre FitHub -->
<section class="container my-5">
    <h2 class="text-center">{{__("idioma.Conoce FitHub")}}</h2>
    <div class="row align-items-center">
        <div class="col-md-6">
            <p class="lead">
               {{__("idioma.FitHub es una plataforma para inscribirse en el gimnasio, acceder a una tienda en línea con alimentos y accesorios, y registrarse en eventos y deportes como Jiu-Jitsu y Boxeo. También ofrece herramientas para planificar entrenos y calcular calorías, con la opción de usar una IA.")}}
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset("media/img/ContenidoInicio/infoFithub/fotoInfoConoceFitHub.jpg")}}" class="img-fluid rounded" alt="Imagen de FitHub">
        </div>
    </div>
</section>

@endsection
