@extends('layouts.master')
@section('content')
<div class="modal fade" id="mensaje" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mensaje Importante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h1 style="text-align: justify;">
                    “Se deja constancia que la Comisión de Recepción, Disciplina y Ética de la C.D.S.C.
                    Everton – Viña del Mar”, tiene un plazo de 7 días hábiles, posteriores a la fecha
                    de recepción, para entregar respuesta a su solicitud”
                </h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-info font-weight-bold" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h5 class="card-label">Donación</h5>
            </div>
        </div>
        {!!Form::open(['route' => 'mantenedor-donacion.store', 'method' => 'POST','files'=>true])!!}
            <div class="card-body">
              <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                                  <label for="">Nombre Completo</label>
                                 {!!Form::text('nombre',null,['class'=>"form-control", 'placeholder'=>"Ingrese sus Nombres..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-6">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                {!!Form::number('telefono',null,['min' => '0','class'=>"form-control", 'placeholder'=>"Ingrese su Número..." , 'required'])!!}
                            </div>

                    </div>
                    <div class="col-6">
                            <div class="form-group">
                             <label for="">Correo</label>
                            {!!Form::text('correo',null,['class'=>"form-control", 'placeholder'=>"Ingrese su Correo..." , 'required'])!!}
                            </div>

                    </div>
                     <div class="col-6">
                        <div class="form-group">
                            <div class="form-check ">
                                <label for="">¿Desea hacerla Anonimamente? </label>
                                <br>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">
                                  si
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">
                                  No
                                </label>
                              </div>
                         </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <a class="btn btn-primary">Información importante</a>
                        </div>
                    </div>
                   <div class="col-12">
                        <div class="form-group">
                            <label for="">Monto a Donar</label>
                             <div class="radio-inline">
                                         <label class="radio radio-rounded">
                                            <input type="radio"  name="monto" id="uno" value="1000" >
                                             <span></span>
                                            <strong>$ 1000</strong>
                                         </label>

                                           <label class="radio radio-rounded">
                                            <input type="radio"  name="monto" id="dos" value="3000" >
                                             <span></span>
                                            <strong>$ 3000</strong>
                                         </label>

                                           <label class="radio radio-rounded">
                                            <input type="radio"  name="monto"  value="5000" >
                                             <span></span>
                                            <strong>$ 5000</strong>
                                         </label>

                                           <label class="radio radio-rounded">
                                            <input type="radio"  name="monto"  value="10000" >
                                             <span></span>
                                            <strong>$ 10000</strong>
                                         </label>
                                         <label class="radio radio-rounded">
                                            <input type="radio"  name="monto"  value="10000" >
                                             <span></span>
                                            <strong>Otro Monto</strong>
                                         </label>
                                    </div>
                                    <br>


                                    {!!Form::number('monto_personalizado',null,['class'=>"form-control", 'placeholder'=>"Ingrese otro Valor..."])!!}


                            </div>
                        </div>





              </div>





            </div>

            <div class="card-footer">
                <div class="row">
                    <button class="btn btn-primary font-weight-bold mr-2">Enviar</button>
                </div>
            </div>
        {!!Form::close()!!}
    </div>
</div>




@endsection
