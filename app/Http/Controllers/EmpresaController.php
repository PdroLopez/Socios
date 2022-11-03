<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Empresa as empresa;

class EmpresaController extends Controller
{
    public function store(Request $request)
    {
        $empresa = new empresa($request->all());
        $empresa->save();
        return redirect::back();
    }
    public function update(Request $request, $id)
    {
        $empresa = empresa::find($id);
        $empresa->fill($request->all());
        $empresa->save();
        return redirect::back();
    }

    public function destroy($id)
    {
        $empresa = empresa::find($id);
        $empresa->delete();
        return redirect::back();
    }
    public function show()
    {
        return view('private.superadmin.empresa.index');
    }
}
