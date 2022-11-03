<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;
use App\Bingo as bingo;
use App\Estado as estado;
use App\User as usuario;
use App\TipoJuego as tipo_juego;
use App\TipoBingo as tipo_bingo;
use App\Rol as rol;
use App\Boleto as boleto;
use App\Participante as participante;
use App\Http\Controllers\PruebaApiController as api;
use Log;

class Rol_ParticipanteController extends Controller
{
  public function index(){
    $bingo = bingo::orderBy('id','DESC')->where('users_id',Auth::user()->id)->paginate(4);
    $boletos = null;
    return view('private.participante.index',compact('bingo'));
  }

  public function paso_1(){
    Session::forget('bingo');
    return view('private.bingo.crear.paso_1');
  }

  public function post_paso_1(Request $request){
    Session::put('bingo_modalidad', $request->modalidad_bingo);
    $tipo_bingo = tipo_bingo::all();
    return view('private.bingo.crear.paso_2', compact('tipo_bingo'));
  }

  public function post_paso_2(Request $request){
    Session::put('bingo_tipo', $request->tipo_bingo);
    $tipo_bingo = session('bingo_tipo');
    return view('private.bingo.crear.paso_3', compact('tipo_bingo'));
  }

  public function post_paso_3(Request $request){

      //crear empresa wooy
      $array = [
        'name' =>Auth::user()->name,
        'rut'=>123,
        'dv'=>1,
        'telefono'=>12345,
        'email'=>Auth::user()->email,
        'password'=>Auth::user()->password,
      ];

      $api = new api();
      $prueba = $api->crearUsuario($array);
      $codigo_array = json_decode($prueba,true);
      $us = Auth::user();
      if(isset($codigo_array['codigo'])){
        $us->id_syswooy = $codigo_array['codigo'];
      }
      $us->save();
      
      


      $columna = 0;
      $fila = 0;
      $diagonal = 0;
      $esquinas = 0;
      $equis = 0;
      $lleno = 0;

      if($request->juegos){
        foreach ($request->juegos as $juego) {

          if($juego == 'columna'){
            $columna = 1;
          }

          if($juego == 'fila'){
            $fila = 1;
          }

          if($juego == 'diagonal'){
            $diagonal = 1;
          }

          if($juego == 'esquinas'){
            $esquinas = 1;
          }

          if($juego == 'equis'){
            $equis = 1;
          }

          if($juego == 'lleno'){
            $lleno = 1;
          }

        }
      }

      $nombre = $request->nombre;
      $descripcion = $request->descripcion;
      $tipoBingo = $request->tipoBingo;
      $fechaInicio = $request->fechaInicio;
      $precio = $request->precio;
      $total_cartones = $request->total_cartones;
      $participantes = $request->participantes;
      $premios = $request->premios;


      do {
        $codigo = 'X'.mt_rand(100000, 999999);
        $bingo_existe = bingo::where('codigo', $codigo)->count();
      } while ($bingo_existe != 0);

      $bingo = bingo::create([
          'n_boletos'=> $total_cartones,
          'nombre'=>$nombre,
          'precio'=>$precio,
          'users_id'=>Auth()->user()->id,
          'fecha_inicio'=>$fechaInicio,
          'tipo_bingo_id'=>$tipoBingo,
          'descripcion'=>$descripcion,
          'tipo_juego_id'=>session('bingo_modalidad'),
          'estado_id'=>4,
          'codigo'=> $codigo,
          'premios' => $premios,
          'columna' => $columna,
          'fila' => $fila,
          'diagonal' => $diagonal,
          'esquinas' => $esquinas,
          'equis' => $equis,
          'lleno' => $lleno,
          'rondas' => $request->rondas,
          'premios' => $request->premios,
      ]);

      //Validacion de Tipo de Bingo
      //90
      if($bingo->tipo_bingo_id == "1"){
          DEFINE('BR', "<br />\n");
          $number_of_cards = $total_cartones; // el monto de codigo unico a generar
          $columns = array(
              range(1,18),
              range(19,36),
              range(37,54),
              range(55,72),
              range(73,90)
          );

          $bingo_cards = array();
          $card_hashes = array();
          $i = 0;
      }

      //75
      if($bingo->tipo_bingo_id == "2"){
          DEFINE('BR', "<br />\n");
          $number_of_cards = $total_cartones; // el monto de cpodigo unico a generar
          $columns = array(
              range(1,15),
              range(16,30),
              range(31,45),
              range(46,60),
              range(61,75)
          );

          $bingo_cards = array();
          $card_hashes = array();
          $i = 0;
      }

      /* generando cartones*/
      while($i < $number_of_cards) {
          $bingo_card = array();

          for($j=0; $j<5; $j++) {
              $random_keys = array_rand($columns[$j], 5);
              $random_values = array_intersect_key($columns[$j], array_flip($random_keys));
              $bingo_card = array_merge($bingo_card, $random_values);
          }

          // generando un unico numero y comparacion entre estos
          $card_hash = md5(json_encode($bingo_card));

          if(!in_array($card_hash, $card_hashes)) {
              $bingo_cards[] = $bingo_card;
              $card_hashes[] = $card_hash;
              $i += 1;
          }

          if($i > 10000) break; // salida segura
      }

      foreach($bingo_cards as $card) {
          for($k=0; $k<(sizeof($card)/5); $k++) {
              (str_pad($card[$k], 2, ' ', STR_PAD_LEFT));
              ($card[$k+5]);
              ($card[$k+10]);
              ($card[$k+15]);
              ($card[$k+20]);
              if($k < 4) (str_repeat('', 22));
          }
          $numeros = json_encode($card);
          $boleto = boleto::create([
              'numeros'=>$numeros,
              'valor'=>$precio,
              'bingo_id'=>$bingo->id,
              'estado_id'=>1,
          ]);
      }

      return redirect('private/juegos');

  }

  public function ver($codigo){
    $bingo = bingo::where('codigo', $codigo)->first();
    return view("private.bingo.ver.index",compact('bingo'));
  }

  public function administrar($codigo){
    $bingo = bingo::where('codigo', $codigo)->first();
    if (Auth::user()->id != $bingo->users_id) {
      abort(404);
    }else{
      return view("private.bingo.administrar.index", compact('bingo'));
    }
  }

  public function administrar_cartones($codigo){
    $bingo = bingo::where('codigo', $codigo)->first();
    if (Auth::user()->id != $bingo->users_id) {
      abort(404);
    }else{
      $boletos = boleto::where('bingo_id',$bingo->id)->where('estado_id', 1)->get();
      return view("private.bingo.administrar.carton", compact('bingo', 'boletos'));
    }
  }

  public function mis_juegos(){
    $boletos_id = participante::where('users_id', Auth::user()->id)->pluck('boleto_id');
    $boletos = boleto::whereIn('id', $boletos_id)->get();
    $bingos_participante = bingo::whereIn('id', $boletos->groupBy('bingo_id')->keys())->get();
    $bingos_cantor = bingo::where('users_id', Auth::user()->id)->get();
    return view("private.participante.mis_juegos", compact('bingos_participante', 'bingos_cantor'));
  }

  public function asignar_carton(Request $request){
    $usuario = usuario::where('email', $request->email)->first();
    if($usuario == null){
      Session::flash('error', "El correo que ingresó no está registrado como un usuario.");
      return Redirect::back();
    }else{

      $bingo = bingo::find($request->bingo_id);
      
      foreach($request->Boletos as $boleto_id){
        $boleto_participante = new participante();
        $boleto_participante->boleto_id = $boleto_id;
        $boleto_participante->users_id = $usuario->id;
        $boleto_participante->bingo_id = $bingo->id;
        $boleto_participante->save();
        $boleto = boleto::find($boleto_id);
        $boleto->estado_id = 3;
        $boleto->save();
      }

      Session::flash('success', "Se han asignado los cartones al usuario.");
      return Redirect::back();

    }
  }

  public function agregar_cartones(Request $request){
    
    $bingo = bingo::find($request->bingo_id);
    $total_cartones = $request->total_cartones;

    if($bingo->tipo_bingo_id == "1"){
      DEFINE('BR', "<br />\n");
      $number_of_cards = $total_cartones; // el monto de codigo unico a generar
      $columns = array(
          range(1,18),
          range(19,36),
          range(37,54),
          range(55,72),
          range(73,90)
      );

      $bingo_cards = array();
      $card_hashes = array();
      $i = 0;
    }

    //75
    if($bingo->tipo_bingo_id == "2"){
      DEFINE('BR', "<br />\n");
      $number_of_cards = $total_cartones; // el monto de cpodigo unico a generar
      $columns = array(
          range(1,15),
          range(16,30),
          range(31,45),
          range(46,60),
          range(61,75)
      );

      $bingo_cards = array();
      $card_hashes = array();
      $i = 0;
    }

    /* generando cartones*/
    while($i < $number_of_cards) {
        $bingo_card = array();

        for($j=0; $j<5; $j++) {
            $random_keys = array_rand($columns[$j], 5);
            $random_values = array_intersect_key($columns[$j], array_flip($random_keys));
            $bingo_card = array_merge($bingo_card, $random_values);
        }

        // generando un unico numero y comparacion entre estos
        $card_hash = md5(json_encode($bingo_card));

        if(!in_array($card_hash, $card_hashes)) {
            $bingo_cards[] = $bingo_card;
            $card_hashes[] = $card_hash;
            $i += 1;
        }

        if($i > 10000) break; // salida segura
    }

    foreach($bingo_cards as $card) {
        for($k=0; $k<(sizeof($card)/5); $k++) {
            (str_pad($card[$k], 2, ' ', STR_PAD_LEFT));
            ($card[$k+5]);
            ($card[$k+10]);
            ($card[$k+15]);
            ($card[$k+20]);
            if($k < 4) (str_repeat('', 22));
        }
        $numeros = json_encode($card);
        $boleto = boleto::create([
            'numeros'=>$numeros,
            'valor'=>$bingo->precio,
            'bingo_id'=>$bingo->id,
            'estado_id'=>1,
        ]);
    }
    
    return Redirect::back();
  }

  public function buscar_bingo(Request $request){
    $q = $request->q;
    $q = str_replace('#', '', $q);
    if($q != "")
    {
      $bingos = bingo::where('codigo', 'LIKE', '%' . $q . '%')->orWhere('nombre', 'LIKE', '%' . $q . '%')->orWhere('descripcion', 'LIKE', '%' . $q . '%')->get();
      return view('busqueda_bingo', compact('bingos'));
    }else{
      $bingos = [];
      return view('busqueda_bingo', compact('bingos'));
    }

  }

  public function administrar_participantes($codigo){
    $bingo = bingo::where('codigo', $codigo)->first();
    if (Auth::user()->id != $bingo->users_id) {
      abort(404);
    }else{
      $array_participantes = array();
      $cont_boletos = 0;
      $participantes = participante::where('bingo_id', $bingo->id)->distinct('users_id')->get();
      foreach($participantes as $participante){
        $array_participantes[$participante->user->id] = ['participante' => $participante, 'boletos' => participante::where('bingo_id', $bingo->id)->where('users_id', $participante->user->id)->count()];
      }
      
      return view("private.bingo.administrar.participantes", compact('bingo', 'array_participantes'));
    }
  }

  public function socio(){
     
    return view('private.participante.home');

  }
  public function corporacion(){
     
    return view('private.corporacion.home');

  }

}
