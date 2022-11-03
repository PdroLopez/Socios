<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipantesController extends Controller
{
    public function index()
    {
        return view('participante');
    }

    public function store(Request $request)
    {
        $participante = new participante($request->all());
        $participante->save();
        return redirect::back();
    }

    public function update(Request $request, $id)
    {
        $participante = participante::find($id);
        $participante->fill($request->all());
        $participante->save();
        return redirect::back();
    }

    public function destroy($id)
    {
        $participante = participante::find($id);
        $participante->delete();
        return redirect::back();
    }
}
