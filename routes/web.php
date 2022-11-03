<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('agregar', 'InscripcionesController@store')->name('agregar');
Route::get('estado', 'InscripcionesController@estado');

Route::group(['middleware' => 'web'], function(){

  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/bingo/{token}', 'BingoController@token')->name('bingo_token');

  //socialite
  Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
  Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


 Route::post('consultas/inscripcion', 'InscripcionesController@consulta_inscripcion');
 Route::post('consultas/cuotas', 'InscripcionesController@consulta_cuotas');
 Route::post('validar/telefono', 'ValidateController@validartelefono');
 Route::get('validar/telefono/success/{codigo}', 'ValidateController@validartelefonosucess');
 Route::get('validar/inscripcion/{token}', 'ValidateController@validadoinscripcion');
 Route::get('terminar/inscripcion/{codigo}', 'InscripcionesController@terminar');

 Route::get('inscripcion-paso-2', 'InscripcionesController@paso_dos');
 Route::get('inscripcion-paso-3/{codigo}', 'InscripcionesController@paso_tres');
 Route::get('inscripcion-paso-4/{codigo}', 'InscripcionesController@paso_cuatro');
 Route::get('inscripcion-finalizada', 'InscripcionesController@finalizada');






  Route::view('terminos-y-condiciones', 'terminos_condiciones');

  Route::view('consulta', 'consulta');
  Route::view('consultas/inscripcion','consulta_inscripciones');
  Route::view('consultas/cuotas','consulta_cuotas');

  Route::view('contacto', 'contacto');
  Route::view('soporte', 'soporte');
  Route::view('acerca-de', 'acerca_de');
  Route::view('preguntas', 'preguntas');
  Route::view('chat', 'chat');

  Route::get('inscripcion', 'InscripcionesController@show');
  Route::get('donacion', 'DonacionesController@show');

  Route::view('preguntas', 'preguntas');
  Route::view('carrito-resumen', 'carrito_resumen');
  Route::view('crear-bingo', 'bingo.crear_bingo');
  Route::view('que-es-bingo', 'que_es');
  Route::view('precios', 'precios');


  Route::resource('mantenedor-contacto','ContactoController');
  Route::delete('mantenedor-contacto/{id}',
      array(
          'uses'=>'ContactoController@destroy',
          'as'=>'mantenedor-contacto.delete'
      )
  );

  Route::resource('mantenedor-inscripcion','InscripcionesController');
  Route::delete('mantenedor-inscripcion/{id}',
      array(
          'uses'=>'InscripcionesController@destroy',
          'as'=>'mantenedor-inscripcion.delete'
      )
  );

  Route::get('documentacion/{id}','InscripcionesController@documentacion')->name('documentacion');


  Route::resource('mantenedor-donacion','DonacionesController');
  Route::delete('mantenedor-donacion/{id}',
      array(
          'uses'=>'DonacionesController@destroy',
          'as'=>'mantenedor-donacion.delete'
      )
  );



  // seccion privada

  Route::group(['middleware' => 'auth','prefix' => 'private'], function () {

    Route::get('socio', 'Rol_ParticipanteController@socio'); // pagina principal cuando se genera el login
    Route::get('corporacion', 'Rol_ParticipanteController@corporacion'); // pagina principal cuando se genera el login

    Route::get('return/callback/pago', 'InscripcionesController@retun_pago'); // pagina principal cuando se genera el login








    Route::group(['middleware' => 'admin', 'prefix' => 'superadmin'], function () {

        Route::get('estado', 'Rol_SuperAdminController@estado');
      Route::get('usuarios', 'Rol_SuperAdminController@usuarios');
      Route::get('inscripcion', 'Rol_SuperAdminController@inscripcion');
      Route::get('estado_inscripcion', 'Rol_SuperAdminController@estado_inscripcion');

      Route::get('inscripcion/{id}','InscripcionesController@inscripcion');


      Route::get('mantenedor-inscripcion/{id}', 'InscripcionesController@estado')->name('mantenedor-inscripcion');
      Route::get('inscripcion/crear-socio/{id}', 'InscripcionesController@crearSocio')->name('mantenedor-inscripcion-crear-socio');
      Route::post('mantenedor-inscripcion-pago/{id}', 'InscripcionesController@InscripcionPago')->name('mantenedor-inscripcion-pago');


      Route::get('area', 'Rol_SuperAdminController@area');
      Route::get('aviso', 'Rol_SuperAdminController@aviso');
      Route::get('donacion', 'Rol_SuperAdminController@donacion');
      Route::get('grupo', 'Rol_SuperAdminController@grupos');
      Route::get('descargar', 'Inscripciones@descarga');

      Route::get('socios', 'InscripcionesController@socios');

      Route::get('rol', 'Rol_SuperAdminController@rol');

      Route::get('empresa', 'Rol_SuperAdminController@empresa');

      Route::get('tipo-bingo', 'Rol_SuperAdminController@tipo_bingo');
      Route::get('tipo-juego', 'Rol_SuperAdminController@tipo_juego');
      Route::get('bingos', 'Rol_SuperAdminController@mantenedor_bingos');
      Route::get('bingos/{id}/boletos', 'Rol_SuperAdminController@bingo_boletos');
      Route::get('bingos/{id}/participante', 'Rol_SuperAdminController@bingo_participantes');

    });

    Route::view('me', 'private/me');

    Route::resource('mantenedor-estado','EstadoController');
    Route::delete('mantenedor-estado/{id}',
        array(
            'uses'=>'EstadoController@destroy',
            'as'=>'mantenedor-estado.delete'
        )
    );


    Route::resource('mantenedor-empresa','EmpresaController');
    Route::delete('mantenedor-empresa/{id}',
        array(
            'uses'=>'EmpresaController@destroy',
            'as'=>'mantenedor-empresa.delete'
        )
    );


    Route::resource('mantenedor-rol','RolController');
    Route::delete('mantenedor-rol/{id}',
        array(
            'uses'=>'RolController@destroy',
            'as'=>'mantenedor-rol.delete'
        )
    );

    Route::resource('mantenedor-cantado','CantadoController');
    Route::delete('mantenedor-cantado/{id}',
        array(
            'uses'=>'CantadoController@destroy',
            'as'=>'mantenedor-cantado.delete'
        )
    );



    Route::resource('mantenedor-tipo-bingo','TipoBingoController');
    Route::delete('mantenedor-tipo-bingo/{id}',
        array(
            'uses'=>'TipoBingoController@destroy',
            'as'=>'mantenedor-tipo-bingo.delete'
        )
    );

    Route::resource('mantenedor-tipo-juego','TipoJuegoController');
    Route::delete('mantenedor-tipo-juego/{id}',
        array(
            'uses'=>'TipoJuegoController@destroy',
            'as'=>'mantenedor-tipo-juego.delete'
        )
    );

    Route::resource('mantenedor-usuarios','UserController');
    Route::delete('mantenedor-usuarios/{id}',
      array(
        'uses'=>'UserController@destroy',
        'as'=>'mantenedor-usuarios.delete'
      )
    );

    Route::resource('mantenedor-bingo','BingoController');
    Route::delete('mantenedor-bingo/{id}',
        array(
            'uses'=>'BingoController@destroy',
            'as'=>'mantenedor-bingo.delete'
        )
    );

    Route::resource('mantenedor-boleto','BoletoController');
    Route::delete('mantenedor-boleto/{id}',
        array(
            'uses'=>'BoletoController@destroy',
            'as'=>'mantenedor-boleto.delete'
        )
    );

    Route::resource('mantenedor-participante','ParticipanteController');
    Route::delete('mantenedor-usuario/{id}',
        array(
            'uses'=>'ParticipanteController@destroy',
            'as'=>'mantenedor-participante.delete'
        )
    );

    //31-07-2020

    //

    //03-08-2020
    Route::resource('mantenedor-participante','ParticipantesController');
    Route::delete('mantenedor-participante/{id}',
        array(
            'uses'=>'ParticipantesController@destroy',
            'as'=>'mantenedor-participante.delete'
        )
    );
    Route::resource('mantenedor-area','AreasController');
    Route::delete('mantenedor-area/{id}',
        array(
            'uses'=>'AreasController@destroy',
            'as'=>'mantenedor-area.delete'
        )
    );
    Route::resource('mantenedor-grupo','GruposController');
    Route::delete('mantenedor-grupo/{id}',
        array(
            'uses'=>'GruposController@destroy',
            'as'=>'mantenedor-grupo.delete'
        )
    );
    //

    //08-08-2020
    Route::resource('mantenedor-aviso','AvisosController');
    Route::delete('mantenedor-aviso/{id}',
        array(
            'uses'=>'AvisosController@destroy',
            'as'=>'mantenedor-aviso.delete'
        )
    );
    //


  });

});
