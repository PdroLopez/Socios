<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;
use App\Bingo as bingo;
use App\Boleto as boleto;
use App\Participante as participante;
use Log;
use Session;
use Auth;
use App\Http\Controllers\PruebaApiController as api;

class PruebaApiController extends Controller
{

    //crear empresa en wooy
    public function crearUsuario(Array $array){

        $client = new Client();

        $request = $client->request('GET', 'crear-doctor', [
        'debug' => FALSE,
        'base_uri' => env('ENDPOINT_WOOY'),
        'headers' => [
            'password'=>$array['password'],
            'nombre' =>$array['name'],
            'rut'=>$array['rut'],
            'dv'=>$array['dv'],
            'telefono'=>$array['telefono'],
            'correo'=>$array['email'],
        ],

        ]);

        $response = $request->getBody();

        return $response;

    }
    //crear cliente en wooy
    public function crearUsuarioPaciente(Array $array){


        $client = new Client();

        $request = $client->request('GET', 'crear-paciente', [
        'debug' => FALSE,
        'base_uri' => env('ENDPOINT_WOOY'),
        'headers' => [
            'password'=>$array['password'],
            'nombre' =>$array['name'],
            'rut'=>$array['rut'],
            'dv'=>$array['dv'],
            'telefono'=>$array['telefono'],
            'correo'=>$array['email'],
            'doctorid'=>$array['cantor_id'],
        ],

        ]);

        $response = $request->getBody();
        Log::info($response);

        return $response;

    }

    //pago transbank
    public function prueba_pago(Request $request)
    {
        //validar usuario
        if (!Auth::user()) {
          return redirect('bingos/crear');
        }

        Session::put('codigo', $request->codigo);
        Session::put('boletos', $request->Boletos);



        Session::put('mensaje',['content'=>'Sus cartones comprados se han registrado en su cuenta','type'=>'info']);


        $client = new Client();

        $request = $client->request('POST', 'transacciones2', [
        'debug' => FALSE,
        'base_uri' => env('ENDPOINT_WOOY'),
        'form_params' => [
            'amount' => $request->total,
            'return_url'=> env('APP_URL').'/api/return',
            'client_id'=>'client_30150CTFYGSzxVa2FSL0DPFYi55104',
            'description'=>'prueba 1',
        ],
        'headers' => [
          'Accept' => 'application/json',
        ]
        ]);
        $response = $request->getBody();
        $array = json_decode($response,true);




        return redirect($array['data']['redirect_url']);
    }

    //return de sistema tyransbank
    public function return(Request $request)
    {
        $transaccion = $request->all();
        $client = new Client();
        $request = $client->request('GET', 'consultar-transaccion', [
        'debug' => FALSE,
        'base_uri' => env('ENDPOINT_WOOY'),
        'headers' => [
            'codigo'=>$transaccion['transaction_id'],
        ],
        ]);
        $response = $request->getBody();
        $array = json_decode($response,true)[0];
        Log::info($array);
        if ($array['estado'] == "pagado") {

          $bingo = bingo::where('codigo', session('codigo'))->first();
          $boletos = session('boletos');


          foreach($boletos as $boleto_id){
            $boleto_participante = new participante();
            $boleto_participante->boleto_id = $boleto_id;
            $boleto_participante->users_id = Auth::user()->id;
            $boleto_participante->bingo_id = $bingo->id;
            $boleto_participante->save();
            $boleto = boleto::find($boleto_id);
            $boleto->estado_id = 3;
            $boleto->save();
          }
          return redirect(asset('/home'));
        }else{
            return redirect(asset('/home'));
        }

    }



    //prueba de consulta de transaccion
    public function prueba_transaccion()
    {
        $client = new Client();

        $request = $client->request('GET', 'consultar-transaccion', [
        'debug' => FALSE,
        'base_uri' => env('ENDPOINT_WOOY'),
        'headers' => [
            'codigo'=>'t_74100GZ3lBN18944',
        ],

        ]);
        $response = $request->getBody();

        return $response;


    }

    public function webhook(Request $request){

  		Log::info('webhook');
  		Log::info($request->all());
  		return response()->json([
      			'status'=>'accept',
      			'message'=>'notificación entregada con éxito'
      		],200);

    }


    //ver las transacciones
    public function transbank()
    {
        $client = new Client();

        $request = $client->request('GET', 'ver-transacciones', [
        'debug' => FALSE,
        'base_uri' => env('ENDPOINT_WOOY'),
        'headers' => [
            'doctorid' =>Auth::user()->id,
        ],

        ]);

        $response = $request->getBody();
        Log::info($response);

        return $response;
    }
    //retiro de dinero (?)
    public function solicitarRetiro()
    {
        $client = new Client();

        $request = $client->request('GET', 'solicitar-retiro', [
        'debug' => FALSE,
        'base_uri' => env('ENDPOINT_WOOY'),
        'headers' => [
            'monto' =>500000,
            'descripcion'=>'prueba de algo',
            'doctorid'=>Auth::user()->id,
        ],

        ]);

        $response = $request->getBody();
        Log::info($response);

        return $response;
    }

    public function prueba(){
        $client = new Client();

        $request = $client->request('GET', 'prueba', [
        'debug' => FALSE,
        'base_uri' => env('ENDPOINT_WOOY'),
        ]);

        $response = $request->getBody();
        Log::info($response);

        return $response;

    }

}
