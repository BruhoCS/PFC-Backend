@extends('layouts.contenido')
@section('contenido')
<div class="container" style="max:width: 700px; margin-bottom: 50px;">
    
    <div class="text-center" style="margin: 20px 0px 20px 0px">
        <span class="text-secondary">Paginación de entrenadores</span>
    </div>
    @if(count($entrenadores)>0){
        <section class="claseEntrenadores">
                @include('cargarEntrenadores')
        </section>
    @else
        <em>No hay entrenadores en este momento</em>
    @endif
    }
</div>
<script type="text/javascript">
    $(function(){
        // Al presionar el enlace de la paginación hace una llamada a cargarEntrenadores pasandole esa misma URL
            $('body').on('click','.pagination a',function(e){
                var url=$(this).attr('href');
                cargarEntrenadores(url);
            })

            function cargarEntrenadores(url){
                $.ajax({
                    url:url
                }).done(function(data){
                    $('.claseEntrenadores').html(data);
                }).fail(function(){
                    console.log("Error al cargar los entrenadores");
                })
            }
    });
</script>
@endsection