<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo as grupo;


class GruposController extends Controller
{
    public function index()
    {
        return view('grupo');
    }

    public function store(Request $request)
    {
        $grupo = new Grupo();
        $grupo->nombre = $request['nombre'];
        $grupo->estado_id = $request['estado_id'];
        $grupo->areas_id = $request['areas_id'];
        $grupo->users_id =  auth()->id();
        $grupo->save();
        return back();
    }

    public function update(Request $request, $id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->nombre = $request->nombre;
        $grupo->estado_id = $request->estado_id;
        $grupo->areas_id = $request->areas_id;
        $grupo->users_id =  auth()->id();
        $grupo->save();
        return back();
    }

    public function destroy($id)
    {
        $grupo = grupo::find($id);
        $grupo->delete();
        return back();
    }
}
