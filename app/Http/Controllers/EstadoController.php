<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Estado as estado;
use Session;
use Auth;

class EstadoController extends Controller
{
    public function store(Request $request)
    {
        $estado = new estado($request->all());
        $estado->save();
        return redirect::back();
    }

    public function update(Request $request, $id)
    {
        $estado = estado::find($id);
        $estado->fill($request->all());
        $estado->save();
        return redirect::back();
    }

    public function destroy($id)
    {
        $estado = estado::find($id);
        $estado->delete();
        return redirect::back();
    }
}
