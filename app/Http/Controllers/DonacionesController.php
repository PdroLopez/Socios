<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donacion as donacion;

class DonacionesController extends Controller
{
    public function index()
    {
        return view('donacion');
    }
    public function show()
    {
        //$estado = Estado::pluck('nombre','id');
        return view("donacion");
    }

    public function store(Request $request)
    {
        $donacion = new donacion($request->all());

        $donacion->estado_id = 8;
      
    
        if ($request->monto == 1000) 
        {
            $donacion->monto = 1000;   
        }
        else if($request->monto == 3000)
        {
            $donacion->monto = 3000;
        }
        else if($request->monto == 5000)
        {
            $donacion->monto = 5000;
         }
        else if($request->monto == 10000)
        {
            $donacion->monto = 10000;
        }       
        else
        {
            $donacion->monto = $request->monto_personalizado;
        }

        $donacion->save();
        return view('home');


        //dd($request->all());
        /*$donacion = new Donacion();
        $donacion->nombre = $request['nombre'];
        $donacion->estado_id = $request['estado_id'];
        $donacion->save();
        return back();*/
    }

    public function update(Request $request, $id)
    {
        $donacion = Donacion::findOrFail($id);
        $donacion->nombre = $request->nombre;
        $donacion->estado_id = $request->estado_id;
        $donacion->save();
        return back();
    }

    public function destroy($id)
    {
        $donacion = donacion::find($id);
        $donacion->delete();
        return back();
    }
}
