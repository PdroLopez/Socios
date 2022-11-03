<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\SolicitudPago as solicitudpago;

use Session;
use Auth;
use App\Inscripcion as Inscripcion;
use App\Participante as participante;
use App\Boleto as boleto;
use DB;
use Log;
use AWS;

class ValidateController extends Controller
{
    
    public function validartelefono(Request $request) {
    
        // if (Inscripcion::where('telefono',$request->telefono)->where('rut',$request->rut)->where('fnacimiento',$request->fnacimiento)) {
        // $codigo = 'X'.mt_rand(100000, 999999);
        // $inscripcion= Inscripcion::where('telefono',$request->telefono)->where('rut',$request->rut)->where('fnacimiento',$request->fnacimiento)->update([
	    //     'codigo'=> $codigo,
	        
        // ]);
        Log::info($request);

        if (Inscripcion::where('rut',$request->rut)->count() > 0) {
            $codigo = 123456;//'X'.mt_rand(100000, 999999);
            $inscripcion= Inscripcion::where('rut',$request->rut)->first();
            $inscripcion->codigo = $codigo;
            $inscripcion->save();

    Log::info('escribiendo el codigo');
    Log::info($inscripcion);

        

    }

        // $sms->publish([
        //     'Message' => 'Tu codigo de activación es '.$codigo.' S',
        //     'PhoneNumber' => $inscripcion->telefono,    
        //     'MessageAttributes' => [
        //         'AWS.SNS.SMS.SMSType'  => [
        //             'DataType'    => 'String',
        //             'StringValue' => 'Transactional',
        //         ]
        //     ],
        // ]);

        return response()->json(['validate' => '1', 'state' => '200']);

    }  

    public function validartelefonosucess($codigo){

        if (Inscripcion::where('codigo',$codigo)) {
            $token = 'X'.mt_rand(100000, 999999);
            $inscripcion= Inscripcion::where('codigo',$codigo)->first();
            $inscripcion->token = $token;
            $inscripcion->save();

        }
 
      return response()->json(['validate' => $token, 'state' => 'CA']);
       // return 'sss';

    }

    public function validadoinscripcion ($token){
     

        if (Inscripcion::where('token',$token)->count() > 0) {
            $inscripcion = Inscripcion::where('token',$token)->first();
            $solicitudpago = solicitudpago::where('id',$inscripcion->pago)->first();
            return view('resumen_suscripcion',compact('inscripcion','solicitudpago'));

        }

        
    }


}
