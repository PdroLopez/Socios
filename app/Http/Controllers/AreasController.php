<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area as area;
use Auth;


class AreasController extends Controller
{
    public function index()
    {
        return view('area');
    }

    public function store(Request $request)
    {
        $area = new Area();
        $area->nombre = $request['nombre'];
        $area->estado_id = $request['estado_id'];
        $area->users_id =  auth()->id();
        $area->save();
        return back();
    }

    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);
        $area->nombre = $request->nombre;
        $area->estado_id = $request->estado_id;
        $area->users_id =  auth()->id();
        $area->save();
        return back();
    }

    public function destroy($id)
    {
        $area = area::find($id);
        $area->delete();
        return back();
    }
}
