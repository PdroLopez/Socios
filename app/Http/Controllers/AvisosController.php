<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aviso as aviso;

class AvisosController extends Controller
{
    public function index()
    {
        return view('aviso');
    }

    public function store(Request $request)
    {
        $aviso = new Aviso();
        $aviso->nombre = $request['nombre'];
        $aviso->users_id =  auth()->id();
        $aviso->save();
        return back();
    }

    public function update(Request $request, $id)
    {
        $aviso = Aviso::findOrFail($id);
        $aviso->nombre = $request->nombre;
        $aviso->users_id =  auth()->id();
        $aviso->save();
        return back();
    }

    public function destroy($id)
    {
        $aviso = aviso::find($id);
        $aviso->delete();
        return back();
    }
}
