<?php

namespace App\Services;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Services\WooyServices;
use App\User as User;
use Log;
use Auth;
use Config;
//use App\Jobs\ProcessNotificacionCompraPelota;

class WooyServices
{
    protected $url;
    protected $http;
    protected $headers;

    public function __construct()
    {
        $client = new Client();    
        $this->url = 'https://integracion.wooy.cl'; // DEBUG 'https://playground.qvo.cl';
        $this->http = $client;
        $this->headers = [
            //'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb21tZXJjZV9pZCI6ImNvbV9uT2tEcmlUYklVODFQTTZ1b0FGS0Z3IiwiYXBpX3Rva2VuIjp0cnVlfQ.0HYIl0kJBWcZyJX9rTPq_bQwzm3rL_0YOShxm6jjesQ'
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb21tZXJjZV9pZCI6ImNvbV91eERrQjJ2ZHY3MllvT25BUHVjQnRnIiwiYXBpX3Rva2VuIjp0cnVlfQ.neT6j6zLaFYnMdzpwr4p-sWBD3u0dk39LFliWhpr0mE',

        ];
    }   

    public function postCrearUsuario($data)
    {
        $client = new Client();

        $body = $client->request('POST', $this->url . '/customers', [
            'json' => [
                'email' => $data['email'],
                'name' => $data['name'],
            ],
            'headers' => $this->headers
        ])->getBody();

        $response = json_decode($body, true);

        return $response;
    }

    public function postCrearUsuarioEmpresa($data)
    {
        $client = new Client();

        $body = $client->request('POST', 'https://panel.wooy.cl/api/crear-usuario-empresa', [
            'json' => [
                'name' => $data['name'],
                'mail' => $data['email'],
                'password' => $data['password'],
                'rut' => $data['rut'],
                'dv' => $data['dv'],
                'telefono' => $data['telefono']
            ],
            'headers' => [
                'Authorization' =>  'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb21tZXJjZV9pZCI6ImNvbV91eERrQjJ2ZHY3MllvT25BUHVjQnRnIiwiYXBpX3Rva2VuIjp0cnVlfQ.neT6j6zLaFYnMdzpwr4p-sWBD3u0dk39LFliWhpr0mE',
                'Accept'        => 'application/json'
            ]
        ])->getBody();

        $response = json_decode($body, true);

        return $response;
    }

    public function crearServicioEmpresa($data)
    {
        $client = new Client();

        $body = $client->request('POST', 'https://panel.wooy.cl/api/crear-servicio-empresa', [
            'json' => [
                'nombre' => $data['nombre'],
                'valor' => $data['valor'],
                'fecha_vencimiento' => $data['fecha_vencimiento'],
                'estado' => 1,
                'empresa_id' => config('values.EmpresaWooyID')
            ],
            'headers' => [
                'Authorization' =>  'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb21tZXJjZV9pZCI6ImNvbV91eERrQjJ2ZHY3MllvT25BUHVjQnRnIiwiYXBpX3Rva2VuIjp0cnVlfQ.neT6j6zLaFYnMdzpwr4p-sWBD3u0dk39LFliWhpr0mE',
                'Accept'        => 'application/json'
            ]
        ])->getBody();

        $response = json_decode($body, true);

        return $response;
        
    }
    public function createClienteAction($data)
    {
        $client = new Client();
        $body = $client->request('POST', 'https://panel.wooy.cl/api/crear-pago-servicio', [
            'json' => [
                 'primer_nombre' => 'primer_nombre',            
                 'segundo_nombre' => 'segundo_nombre',            
                 'primer_apellido' => 'primer_apellido',            
                 'segundo_apellido' => 'segundo_apellido',            
                 'correo' => $data['correo'],            
                 'telefono' => $data['telefono'],            
                 'empresa_id' => config('values.EmpresaWooyID')
            ],
            'headers' => [
                'Authorization' =>  'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb21tZXJjZV9pZCI6ImNvbV91eERrQjJ2ZHY3MllvT25BUHVjQnRnIiwiYXBpX3Rva2VuIjp0cnVlfQ.neT6j6zLaFYnMdzpwr4p-sWBD3u0dk39LFliWhpr0mE',
                'Accept'        => 'application/json'
            ]
        ])->getBody();

        $response = json_decode($body, true);

        return $response;
        
    }

    public function createTransaccionAction($data_transbank)
    {
        $client = new Client();
        $body = $client->request('POST', 'https://panel.wooy.cl/api/crear-transaccion-solicitud', [
            'json' => [
                'descripcion' => $data_transbank['descripcion'],            
                'cliente_id' => $data_transbank['cliente_id'],            
                'empresa_id' => config('values.EmpresaWooyID'),            
                'return_url' => config('values.WooyCallBack'),            
                'total' => $data_transbank['total'],
                'servicio_id'=>$data_transbank['servicio_id_wooy']            
            ],
            'headers' => [
                'Authorization' =>  'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb21tZXJjZV9pZCI6ImNvbV91eERrQjJ2ZHY3MllvT25BUHVjQnRnIiwiYXBpX3Rva2VuIjp0cnVlfQ.neT6j6zLaFYnMdzpwr4p-sWBD3u0dk39LFliWhpr0mE',
                'Accept'        => 'application/json'
            ]
        ])->getBody();

        $response = json_decode($body, true);

        return $response;
    }

    public function consultaPagoTransbank($codigo)
    {
        $client = new Client();
        $body = $client->request('GET', 'https://panel.wooy.cl/api/consultar/transaccion/'.$codigo->codigo, [
            'json' => [],
            'headers' => [
                'Authorization' =>  'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb21tZXJjZV9pZCI6ImNvbV91eERrQjJ2ZHY3MllvT25BUHVjQnRnIiwiYXBpX3Rva2VuIjp0cnVlfQ.neT6j6zLaFYnMdzpwr4p-sWBD3u0dk39LFliWhpr0mE',
                'Accept'        => 'application/json'
            ]
        ])->getBody();

        $response = json_decode($body, true);

        return $response;
    }
    public function consultaSlug($slug)
    {
        $client = new Client();
        $body = $client->request('GET', 'https://panel.wooy.cl/api/consultar/transaccion/servicios/'.$slug, [
            'json' => [],
            'headers' => [
                'Authorization' =>  'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjb21tZXJjZV9pZCI6ImNvbV91eERrQjJ2ZHY3MllvT25BUHVjQnRnIiwiYXBpX3Rva2VuIjp0cnVlfQ.neT6j6zLaFYnMdzpwr4p-sWBD3u0dk39LFliWhpr0mE',
                'Accept'        => 'application/json'
            ]
        ])->getBody();

        $response = json_decode($body, true);

        return $response;
    }

}