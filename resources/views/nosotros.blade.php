 @extends('plantilla')


 @section('seccion')
    <h1>Este es mi equipo de trajajo</h1>
    @foreach($equipo as $item)
        <a href="{{ route('nosotros', $item)}}" class = "h4 text-danger">{{$item}}</a><br>
    @endforeach

    @if(!empty($nombre))
        @switch($nombre)
            @case($nombre=='Ignacio')
                <h2 class="mt-5"> En nombre es {{ $nombre }}</h2>
                <p>el trolazo de la clase A</p>
                @break
            @case($nombre=='Juanito')
                <h2 class="mt-5"> En nombre es {{ $nombre }}</h2>
                <p>el trolazo de la clase B</p>
                @break
            @case($nombre=='Pedrito')
                <h2 class="mt-5"> En nombre es {{ $nombre }}</h2>
                <p>el trolazo de la clase C</p>
                @break
        @endswitch
    @endif


 @endsection

