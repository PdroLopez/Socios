<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;

class ContactoController extends Controller
{
    public function store(Request $request)
    {

        $contacto = new Contacto($request->all());
        $contacto->save();
        return back();
    }
    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
