<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PageController extends Controller
{
    public function inicio(){
        $notas = App\Models\Note::all();
        return view('welcome', compact('notas'));
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