@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h5 class="card-label">Revisión estado de solicitud de ingreso para socio o socia.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             </h5>
            </div>
        </div>
    {{-- <form method="POST" action=" {{asset('consulta/suscripcion')}}" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="bShEpO9YG69UPhcoZrDrx3MJTe3tq7vrvehLNvaD">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Rut*</label>
                            <input class="form-control" placeholder="Ingrese su rut... 15991088-1"  name="rut" type="text">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Fecha de Nacimiento*</label>
                            <input class="form-control" placeholder="Ingrese su fecha de nacimiento..."  name="fnacimiento" type="date">
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Telefono*</label>
                            <input class="form-control" placeholder="Ingrese su telefono..."  name="telefono" type="number">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <br>
                            <a href="#" onclick="enviarConsultaSuscripcion(1)"  class="btn btn-xs btn-outline btn-warning">Enviar </a>
                        </div>
                    </div>
                </div>

                   
            </div>
            
    </form> --}}

    <main role="main" class="container">

        <h1 class="mt-5">Hola {{$inscripcion->name}}</h1>
        <p class="lead"> Tu solicitud número <strong>{{$inscripcion->id}}</strong> tiene el estado de : <strong>{{$inscripcion->estado->nombre}}</strong> con el siguiente comentario : <strong>{{$inscripcion->estadodescripcion}}</strong> recuerde que para mayor información podrpá comunicarse a <a href="">comunicaciones@corproacioneverton.cl</a>  o al fono <a href="">123456789</a> vía watsup.</p>
        <br>
        <br>
        <h3 class="mt-3">Solicitudes de pago pendientes</h3>
        <hr>
        <div class="row">
            <div class="col">
                <p><strong>Pago  :</strong>{{$solicitudpago->nombre}} </p>
                <p><strong>Descripción :</strong>{{$solicitudpago->descripcion}}</p>
                <p><strong>Comentario :</strong>{{$solicitudpago->comentario}}</p>
            </div>
            <div class="col">
                <h4><strong>Monto: </strong> ${{$solicitudpago->comentario}}</h4>
                <a href="https://panel.wooy.cl/gateway/webpay/transaction/{{$solicitudpago->transaccion}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Pagar</a>
            </div>
        </div>
        

        
        <hr>
        

      </main>
    </div>
</div>
@stop
