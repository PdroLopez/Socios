<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;
use App\Estado as estado;
use App\Area as area;
use App\Grupo as grupo;
use App\User as usuario;
use App\Aviso as aviso;
use App\Donacion as donacion;

use App\Inscripcion as inscripcion;
use App\Empresa as empresa;

use App\TipoJuego as tipo_juego;
use App\TipoBingo as tipo_bingo;
use App\Bingo as bingo;
use App\Rol as rol;
use App\Boleto as boleto;
use App\Participante as participante;
use App\Http\Controllers\PruebaApiController as api;
use Log;

class Rol_SuperAdminController extends Controller
{
    public function bingos(){
      $bingos = bingo::orderBy('id','DESC')->paginate(6);
      return view("lista_bingo", compact('bingos'));
    }

    public function comprar_bingo($codigo){
        $bingo = bingo::where('codigo',$codigo)->first();
        $boletos = boleto::where('bingo_id',$bingo->id)->where('estado_id', 1)->get();
        return view("private.bingo.compra_1", compact('bingo','boletos'));
    }

    public function comprar_boletos($codigo, Request $request){
      $bingo = bingo::where('codigo', $codigo)->first();

      if($request->total == 0){
        foreach($request->Boletos as $boleto_id){
          $boleto_participante = new participante();
          $boleto_participante->boleto_id = $boleto_id;
          $boleto_participante->users_id = Auth::user()->id;
          $boleto_participante->bingo_id = $bingo->id;
          $boleto_participante->save();
          $boleto = boleto::find($boleto_id);
          $boleto->estado_id = 3;
          $boleto->save();
        }

        return redirect('/home');

      }
    }

    public function mantenedor_bingos(){
      $bingos = bingo::orderBy('id','DESC')->paginate(6);
      return view("private.superadmin.bingo.index",compact('bingos'));
    }

    public function usuarios()
    {
        $usuario = usuario::paginate(10);
        $roles = rol::pluck('nombre','id');
        return view("private.superadmin.usuario.index",compact('usuario','roles'));
    }
    public function inscripcion()
    {
        $inscripcion = inscripcion::all();

        $estado = Estado::pluck('nombre','id');
        return view("private.superadmin.inscripcion.index",compact('inscripcion','estado'));
    }

    public function empresa()
    {
        $empresa = empresa::all();
        return view("private.superadmin.empresa.index",compact('empresa'));
    }

    public function area()
    {
        $area = Area::all();

        $estado = rol::pluck('nombre','id');
        return view("private.superadmin.area.index",compact('area','estado'));
    }
    public function aviso()
    {
        $aviso = Aviso::all();
        //$estado = rol::pluck('nombre','id');
        return view("private.superadmin.avisos.index",compact('aviso'));
    }

    public function donacion()
    {
        $donacion = Donacion::all();
        $estado = Estado::pluck('nombre','id');
        return view("private.superadmin.donacion.index",compact('donacion','estado'));
    }
    public function grupos()
    {
        $grupo = Grupo::all();
        $area = Area::pluck('nombre','id');
        $estado = Estado::pluck('nombre','id');
        return view("private.superadmin.grupos.index",compact('grupo','area','estado'));
    }



    public function rol()
    {
        $rol = rol::all();
        return view("private.superadmin.rol.index",compact('rol'));
    }

    public function estado()
    {
        $estado = estado::all();
        return view("private.superadmin.estado.index",compact('estado'));
    }

    public function tipo_bingo()
    {
        $tipo_bingos = tipo_bingo::all();
        return view("private.superadmin.tipo_bingo.index",compact('tipo_bingos'));
    }

    public function tipo_juego()
    {
        $tipo_juegos = tipo_juego::all();
        return view("private.superadmin.tipo_juego.index",compact('tipo_juegos'));
    }

    public function me(){
        $bingo = bingo::orderBy('id','DESC')->where('users_id',Auth::user()->id)->paginate(4);
        $total = bingo::where('users_id',Auth::user()->id)->get();
        $i = 0;
        foreach ($total as $value) {
            $i++;
        }
        return view('private.mis_bingos',compact('bingo','i'));
    }

    public function bingo_boletos($id)
    {
        dd('bingo_boletos');
        // $tipo_juegos = tipo_juego::all();
        return view("private.superadmin.tipo_juego.index",compact('tipo_juegos'));
    }

    public function bingo_all($id)
    {
        dd('bingo_boletos');

        // $tipo_juegos = tipo_juego::all();
        return view("private.superadmin.tipo_juego.index",compact('tipo_juegos'));
    }

    public function bingo_participantes($id)
    {
        dd('bingo_boletos');

        // $tipo_juegos = tipo_juego::all();
        return view("private.superadmin.tipo_juego.index",compact('tipo_juegos'));
    }

}
