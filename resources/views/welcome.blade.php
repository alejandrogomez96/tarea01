@extends('plantilla')


@section('seccion')
    
        <a href="{{ route('notas.editar') }}" class="mt-5 btn btn-primary">COMPRAR O VENDER</a>
    

        <h1 class="display-4">INVENTARIO</h1>

        @if (session('mensaje'))
            <div class="alert alert-success">
            {{ session('mensaje')}}
            </div>
        @endif




        <form action="{{ route('notas.crear') }}" method="POST">
            @csrf
            <input type="text" name="nombre" placeholder="Producto" class="form-control mb-2">
            <input type="text" name="descripcion" placeholder="Categoria" class="form-control mb-2">
            <input type="text" name="cantidad" placeholder="Cantidad" class="form-control mb-2">
            <button class="btn btn-primary btn-block" type="submit">Agregar Producto</button>
        </form>



        <table class="table">

            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>

        <tbody>
            @foreach($notas as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td><a href="{{ route('notas.detalle',$item) }}">{{$item->nombre}}</a> </td>
                <td>{{$item->descripcion}}</td>
                <td>{{$item->cantidad}}</td>
                <td>@mdo</td>
            </tr>
            @endforeach()
           
        </tbody>
        </table>
    </div>
<?php
use \koolreport\widgets\koolphp\Table;
use \koolreport\widgets\google\ColumnChart;
//$data = array($notas);

ColumnChart::create(array(
    "dataSource"=>$data
));

?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
@endsection