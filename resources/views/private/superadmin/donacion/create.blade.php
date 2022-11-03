<button class="btn btn-primary btn-icon-sm" data-target="#create" data-toggle="modal" type="button">
    <i class="flaticon2-plus"></i>
    Nueva Donacion
</button>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!!Form::open(['route' => 'mantenedor-donacion.store', 'method' => 'POST','files'=>true])!!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nueva Donacion
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            {!!Form::text('nombre',null,['class'=>"form-control", 'placeholder'=>"Ingrese sus Nombres..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            {!!Form::text('apellidos',null,['class'=>"form-control", 'placeholder'=>"Ingrese sus Apellidos..." , 'required'])!!}
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
                            {!!Form::number('correo',null,['class'=>"form-control", 'placeholder'=>"Ingrese su Correo..." , 'required'])!!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-check ">
                                <label for="">¿Desea hacerla Anonimamente? </label>
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
                </div>

{{--                 <div class="form-group">
                    <label for="">Clase</label>
                    {!!Form::text('class',null,['class'=>"form-control", 'placeholder'=>"Ingrese texto..."])!!}
                </div> --}}
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-primary">
                    Registrar
                </button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
