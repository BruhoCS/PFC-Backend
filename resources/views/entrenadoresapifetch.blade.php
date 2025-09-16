@isset($nombres)
    @if (count($nombres) > 0)
        @foreach ($nombres as $item)
            <p class="p-2"><a href="/entren/{{ $item->id }}">{{ $item->nombre }}</a></p>
        @endforeach
    @else
        <em>No hay resultados</em>
    @endif
@endisset
