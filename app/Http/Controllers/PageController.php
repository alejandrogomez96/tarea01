<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PageController extends Controller
{
    public function inicio(){
        $notas = App\Models\Note::all();
        $edd = 1;
        $nota = App\Models\Note::findOrFail(1);
        $nota3 = App\Models\Note::findOrFail(3);
        $nota5 = App\Models\Note::findOrFail(5);
        $data = array(
        array("producto"=>"$nota->nombre","cantidad"=>($nota->cantidad)),
        array("producto"=>"$nota3->nombre","cantidad"=>($nota3->cantidad)),
        array("producto"=>"$nota5->nombre","cantidad"=>($nota5->cantidad))
    );
        return view('welcome', compact('notas', 'data'));
    }

    public function detalle($id){
        $nota = App\Models\Note::findOrFail($id);
        return view('notas.detalle', compact('nota'));
    }

    public function crear(Request $request){
        //*return $request->all();
        //$request->validate([
        //    'nombre' => 'required',
        //    'descripcion' => 'required'
        //]);
        $notaNueva = new App\Models\Note;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;
        $notaNueva->cantidad = $request->cantidad;
        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada');
    }

    public function crear2(Request $request){
        $notas = App\Models\Note::all();
        $nombre2 = $request->nombre;
        $descripcion2 = $request->descripcion;
        $cantidad2 = $request->cantidad;
        foreach ($notas as $item) {
            if($nombre2==$item->nombre && $descripcion2==$item->descripcion){
                $ident = $item->id;
                $notaUpdate = App\Models\Note::findOrFail($ident);
                $cantult = $notaUpdate->cantidad;
                $notaUpdate->nombre = $request->nombre;
                $notaUpdate->descripcion = $request->descripcion;
                $notaUpdate->cantidad = ($request->cantidad)+($cantult);
                $notaUpdate->save();
                return back();
            }
        }
    }

    public function editar(Request $request){
        $notas = App\Models\Note::all();
        return view('notas.editar',compact('notas'));
    }

    public function blog(){
        return view('blog');
    }
    public function fotos(){
        return view('fotos');
    }
    public function nosotros($nombre = null){
        $equipo= ['Ignacio', 'Juanito', 'Pedrito'];

        //return view('nosotros',['equipo'=>$equipo]);
        return view('nosotros',compact('equipo','nombre'));
    }
}