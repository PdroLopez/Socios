<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscripcion as inscripcion;
use App\SolicitudPago as solicitudpago;
use App\User as Usuario;
use Illuminate\Support\Facades\Redirect;
use App\Services\WooyServices;
use Session;
use App\Estado as estado;

class InscripcionesController extends Controller
{

    public function consultar_cuotas()
    {
        return view('inscripcion');
    }

    public function consultar_inscripcion()
    {
        return view('inscripcion');
    }


    public function index()
    {
        return view('inscripcion');
    }
    public function show()
    {
        $inscripcion = inscripcion::where('estado_id',1)->OrderBy('id','desc')->limit(1)->get();

       return view("create",compact('inscripcion'));
    }
    public function inscripcion($id)
    {
        $inscripcion = Inscripcion::where('id',$id)->get();
        return view('private.superadmin.inscripcion.ver',\compact('inscripcion'));
    }

    public function InscripcionPago(Request $request,$id){

        $user = usuario::where('suscripcion_id',$request->id)->get();
        $user=$user[0];
        $data = array(
            'descripcion' => $request->descripcion,
            'cliente_id' => $user->id_syswooy,
            'total' => $request->monto,
            'servicio_id_wooy'=>null
        );

        $sys_woy = new WooyServices();
        $wooy= $sys_woy->createTransaccionAction($data);

        $solicitudpago = solicitudpago::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'estado_id'=>$request->estado_id,
            'transaccion'=>$wooy['codigo'],
            'tiposolicitud'=>'inscripcion',
            'suscripcion_id'=>$request->id,
            'users_id' => $user->id,
            'monto' =>$request->monto,
            'comentario' =>$request->comentario,

        ]);

        $inscripcion = inscripcion::find($solicitudpago->id);
        $inscripcion->pago = $solicitudpago->id;
        $inscripcion->save();

        Session::flash('success','solicitud de pago creado con éxito');

        return back();

    }
    public function retun_pago($id){
        dd($id);
    }
    public function crearSocio($id){
        if (inscripcion::where('id',$id)->count() > 0){
            $inscrito = inscripcion::find($id);
            $data = array(
                'correo' => $inscrito->email,
                'telefono' => $inscrito->telefono,
            );

            $sys_woy = new WooyServices();
            $wooy= $sys_woy->createClienteAction($data);
                if (Usuario::where('email',$inscrito->email)->count() > 0){

                    $socio = Usuario::where('email',$inscrito->email)->update([
                        'id_syswooy' =>$wooy['codigo']
                       ]);
                    Session::flash('info','el correo asociado a esta persona ya esta como socio en el sistema');
                    return back();

               }else{
                $socio = Usuario::create([
                    'name'=>$inscrito->name,
                    'email'=>$inscrito->email,
                    'rut'=>$inscrito->rut,
                    'edad'=>$inscrito->edad,
                    'password'=>$wooy['codigo'],
                    'suscripcion_id'=>$inscrito->id,
                    'rol_id' => 3,
                    'id_syswooy' =>$wooy['codigo']
                ]);

                Session::flash('success','se ha creado al socio con exito!');

                return back();

               }

        }



    }

    public function estado(Request $request, $id)
    {

        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->estado_id = $request->estado_id;
        $inscripcion->save();
        return back();
    }

    public function socios()
    {
        $deportiva = inscripcion::where('rama','deportiva')->limit(1)->get();
        $cultural = inscripcion::where('rama','cultural')->limit(1)->get();
        $social = inscripcion::where('rama','social')->limit(1)->get();
        $socios_deportiva = inscripcion::where('estado_id',3)->Where('rama','deportiva')->get();
        $socios_cultural = inscripcion::where('estado_id',3)->Where('rama','cultural')->get();
        $socios_social = inscripcion::where('estado_id',3)->Where('rama','social')->get();



        return view('private.superadmin.socios.socios',compact('deportiva','cultural','social','socios_deportiva','socios_cultural','socios_social'));
    }
    public function continuar($codigo)
    {
        $inscripcion = inscripcion::where('codigo_inscripcion',$codigo)->get();
        $estudios = inscripcion::pluck('estudios','id');
        $rama = inscripcion::pluck('rama','id');
        $parentesco = inscripcion::pluck('parentesco_apoderado','id');
        //dd($inscripcion);
        return view('create2',compact('inscripcion','estudios','rama','parentesco'));

    }

    public function terminar($codigo)
    {
        $inscripcion = inscripcion::where('codigo_inscripcion',$codigo)->get();
        $estudios = inscripcion::pluck('estudios','id');
        $rama = inscripcion::pluck('rama','id');
        $parentesco = inscripcion::pluck('parentesco_apoderado','id');
        //dd($inscripcion);
        return view('create3',compact('inscripcion','estudios','rama','parentesco'));

    }
    public function paso_dos()
    {
        $codigo = null;
        return view('create2',compact('codigo'));
    }

    public function paso_tres($codigo)
    {
        /*
        */
        $inscripcion = inscripcion::where('codigo_inscripcion',$codigo)->get();
        $estudios = inscripcion::pluck('estudios','id');
        $rama = inscripcion::pluck('rama','id');
        $parentesco = inscripcion::pluck('parentesco_apoderado','id');
        return view('create3',compact('inscripcion','estudios','rama','parentesco'));

    }

    public function finalizada()
    {



      return redirect('/');


    }

    public function paso_cuatro($codigo)
    {
        /*
        $estudios = inscripcion::pluck('estudios','id');
        $rama = inscripcion::pluck('rama','id');
        $parentesco = inscripcion::pluck('parentesco_apoderado','id');
        */
        $inscripcion = inscripcion::where('codigo_inscripcion',$codigo)->get();


        return view('create4',compact('inscripcion'));

    }



    public function store(Request $request)
    {

        try
        {
            $request->validate([

                'cedula_delantera' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'cedula_trasera' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $inscripcion = new Inscripcion($request->all());
            $inscripcion->codigo_inscripcion = mt_rand(100000, 999999);
            $inscripcion->estado_id = 1;

            if ($request->hasfile('cedula_delantera')) {
                $file= $request->file('cedula_delantera');
                $extension = $file->getClientOriginalExtension();
                $filename= time() . '.' .$extension;
                $file->move('public/cedula_delantera/',$filename);
                $inscripcion->cedula_delantera = $filename;
            }
            else
            {
                return $request;
                $inscripcion->cedula_delantera = '';
            }

            if ($request->hasfile('cedula_trasera')) {
                $file= $request->file('cedula_trasera');
                $extension = $file->getClientOriginalExtension();
                $filename= time() . '.' .$extension;
                $file->move('public/cedula_trasera/',$filename);
                $inscripcion->cedula_trasera = $filename;
            }
            else
            {
                return $request;
                $inscripcion->cedula_trasera = '';
            }
            $inscripcion->save();
            $codigo = $inscripcion->codigo_inscripcion;


            Session::flash('mensaje',['content'=>'Registro agregado correctamente','type'=>'primary']);

            return view('create2',compact('codigo'));
       }
         catch (Exception $e)
        {
            Session::flash('mensaje',['content'=>'Surgio un problema inesperado, intente mas tarde','type'=>'danger']);
            return redirect::back();
        }






        //$inscripcion = inscripcion::where('id',$request->id)->get();
        //return back();

/*
        if ($request->hasfile('cedula_delantera')) {
            $file= $request->file('cedula_delantera');
            $extension = $file->getClientOriginalExtension();
            $filename= time() . '.' .$extension;
            $file->move('public/cedula_delantera/',$filename);
            $inscripcion->cedula_delantera = $filename;
        }
        else
        {
            return $request;
            $inscripcion->cedula_delantera = '';
        }

        if ($request->hasfile('cedula_trasera')) {
            $file= $request->file('cedula_trasera');
            $extension = $file->getClientOriginalExtension();
            $filename= time() . '.' .$extension;
            $file->move('public/cedula_trasera/',$filename);
            $inscripcion->cedula_trasera = $filename;
        }
        else
        {
            return $request;
            $inscripcion->cedula_trasera = '';
        }
        if ($request->hasfile('foto_carnet')) {
            $file= $request->file('foto_carnet');
            $extension = $file->getClientOriginalExtension();
            $filename= time() . '.' .$extension;
            $file->move('public/foto_carnet/',$filename);
            $inscripcion->foto_carnet = $filename;
        }
        else
        {
            return $request;
            $inscripcion->foto_carnet = '';
        }
        if ($request->hasfile('antecedentes')) {
            $file= $request->file('antecedentes');
            $extension = $file->getClientOriginalExtension();
            $filename= time() . '.' .$extension;
            $file->move('public/antecedentes/',$filename);
            $inscripcion->antecedentes = $filename;
        }
        else
        {
            return $request;
            $inscripcion->antecedentes = '';
        }*/
       // $inscripcion->save();
        //$inscripcion = inscripcion::all();


        //return view('create',compact());

    }
    public function documentacion(Request $request, $id)
    {
        return "hola";

    }

    public function update(Request $request, $id)
    {
        try {


            $inscripcion = inscripcion::find($id);
            $inscripcion->fill($request->all());
            $request->validate([

                'cedula_delantera' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'cedula_trasera' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'foto_carnet' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'antecedentes' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasfile('cedula_delantera')) {
                $file= $request->file('cedula_delantera');
                $extension = $file->getClientOriginalExtension();
                $filename= time() . '.' .$extension;
                $file->move('public/cedula_delantera/',$filename);
                $inscripcion->cedula_delantera = $filename;
            }
            else
            {

            }

            if ($request->hasfile('cedula_trasera')) {
                $file= $request->file('cedula_trasera');
                $extension = $file->getClientOriginalExtension();
                $filename= time() . '.' .$extension;
                $file->move('public/cedula_trasera/',$filename);
                $inscripcion->cedula_trasera = $filename;
            }
            else
            {
            }
            if ($request->hasfile('foto_carnet')) {
                $file= $request->file('foto_carnet');
                $extension = $file->getClientOriginalExtension();
                $filename= time() . '.' .$extension;
                $file->move('public/foto_carnet/',$filename);
                $inscripcion->foto_carnet = $filename;
            }
            else
            {
            }
            if ($request->hasfile('antecedentes')) {
                $file= $request->file('antecedentes');
                $extension = $file->getClientOriginalExtension();
                $filename= time() . '.' .$extension;
                $file->move('public/antecedentes/',$filename);
                $inscripcion->antecedentes = $filename;
            }
            else
            {
            }

            if ($request->hasfile('comprobante')) {
                $file= $request->file('comprobante');
                $extension = $file->getClientOriginalExtension();
                $filename= time() . '.' .$extension;
                $file->move('public/comprobante/',$filename);
                $inscripcion->comprobante = $filename;
            }
            else
            {
            }




            $inscripcion->save();
            Session::flash('mensaje',['content'=>'Registro actualizado correctamente','type'=>'primary']);
            return redirect::back();



        }  catch (Exception $e)
        {
            Session::flash('mensaje',['content'=>'Surgio un problema inesperado, intente mas tarde','type'=>'danger']);
            return redirect::back();
        }





    }

    public function destroy($id)
    {
        $inscripcion = Inscripcion::find($id);
        $inscripcion->delete();
        return back()->with('Datos eliminado');
    }
}
