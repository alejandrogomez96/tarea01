@extends('plantilla')

@section('seccion')

    <h1>ENTRADAS Y SALIDAS </h1>
    <form action="{{ route('notas.crear2') }}" method="POST">
            @method('PUT')
            @csrf
            <input type="text" name="nombre" placeholder="Producto (Utilizar productos existentes)" class="form-control mb-2">
            <input type="text" name="descripcion" placeholder="Categoria (Utilizar categorias existentes)" class="form-control mb-2">
            <input type="text" name="cantidad" placeholder="Cantidad (Por Ejem. 9 para entradas y -5 salidas)" class="form-control mb-2">
            <button class="btn btn-primary btn-block" type="submit">Agregar o Retirar</button>
    </form>



@endsection
