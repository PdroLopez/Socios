<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$inscripciones->id}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-inscripcion.update',$inscripciones->id],'files'=>true, 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Inscripcion
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre</label>
                        {!!Form::text('nombre',$inscripciones->nombre,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                    </div>
                    <div class="form-group">
                        <label for="">Rut</label>
                        {!!Form::text('rut',$inscripciones->rut,['class'=>"form-control", 'placeholder'=>"Ingrese un rut..." , 'required'])!!}
                    </div>

                    <div class="form-group">
                        <label for="">Fecha de Nacimiento</label>
                        {!!Form::date('fnacimiento',$inscripciones->fnacimiento,['class'=>"form-control", 'placeholder'=>"Ingrese su fecha de nacimiento..." , 'required'])!!}
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Direccion</label>
                        {!!Form::text('direccion',$inscripciones->direccion,['class'=>"form-control", 'placeholder'=>"Ingrese su direccion..." , 'required'])!!}
                    </div>
                    <div class="form-group">
                        <label for="">Telefono</label>
                        {!!Form::number('telefono',$inscripciones->telefono,['class'=>"form-control", 'placeholder'=>"Ingrese su telefono..." , 'required'])!!}
                    </div>
                    <div class="form-group">
                        <label for="">Correo Electronico</label>
                        {!!Form::email('correo',$inscripciones->correo,['class'=>"form-control", 'placeholder'=>"Ingrese su Correo Electronico..." , 'required'])!!}
                    </div>
                    <div class="form-group">
                        <label for="">Estudios</label>
                        {!!Form::text('estudios',$inscripciones->estudios,['class'=>"form-control", 'placeholder'=>"Ingrese sus estudios aprobados..." , 'required'])!!}
                    </div>
                    <div class="form-group">
                        <label for="">Estudios</label>
                        <select class="form-control" id="rama" name="rama">
                            <option value="deportiva">Deportiva</option>
                            <option value="cultural">Cultural</option>
                            <option value="social">Social</option>
                            <option value="ninguna">Ninguna</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="institucion" class="">¿Pertenece a alguna institución o agrupación en la actualidad?</label>
                        <div class="col-md-6"><div class="form-group">

                            <div class="radio-inline">
                                <label class="radio radio-rounded">
                                <input type="radio" name="institucion" value="Yes" onChange="perteneceValue(this)">
                                <span></span>Si</label>
                                <label class="radio radio-rounded">
                                <input type="radio" checked="checked" name="institucion" value="No" onChange="perteneceValue(this)">
                                <span></span>No</label>
                            </div>
                            <script type="text/javascript">
                            function perteneceValue(x) {
                                if(x.value == 'No'){
                                    document.getElementById("pertenece").style.display = 'none';
                                }
                                else{
                                    document.getElementById("pertenece").style.display = 'block';
                                }
                            }
                            </script>
                            <br>

                            <div id="pertenece" style="display:none;">
                                <span class="form-text text-muted">Si pertenece, nómbrela.</span>
                                  {!!Form::text('nombre_institucion',$inscripciones->nombre_institucion,['class'=>"form-control", 'placeholder'=>"Ingrese institucion o agrupación..."])!!}
                                  <br>
                                <span class="form-text text-muted">Indique fono de la misma y/o email.</span>

                                {!!Form::number('fono_institucion',$inscripciones->fono_institucion,['class'=>"form-control", 'placeholder'=>"Ingrese fono..."])!!}
                                <br>
                                {!!Form::email('email_institucion',$inscripciones->email_institucion,['class'=>"form-control", 'placeholder'=>"Ingrese correo..."])!!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sancion" class="">¿Ha sufrido alguna sanción y/o pena aflictiva?</label>
                        <div class="col-md-6"><div class="form-group">
                            <label> </label>
                            <div class="radio-inline">
                                <label class="radio radio-rounded">
                                <input type="radio" name="sancion" value="Yes" onChange="sancionValue(this)">
                                <span></span>Si</label>
                                <label class="radio radio-rounded">
                                <input type="radio" checked="checked" name="sancion" value="No" onChange="sancionValue(this)">
                                <span></span>No</label>
                            </div>
                            <script type="text/javascript">
                            function sancionValue(x) {
                                if(x.value == 'No'){
                                    document.getElementById("sancionado").style.display = 'none';
                                }
                                else{
                                    document.getElementById("sancionado").style.display = 'block';
                                }
                            }
                            </script>
                            <div id="sancionado" style="display:none;">
                                <span class="form-text text-muted">Si es asi, indique entre que fechas.</span>
                                {!!Form::date('sancion_comienzo',$inscripciones->sancion_comienzo,['class'=>"form-control", 'placeholder'=>"Ingrese la fecha..."])!!}
                              <br>
                              {!!Form::date('sancion_termino',$inscripciones->sancion_termino,['class'=>"form-control", 'placeholder'=>"Ingrese la fecha..."])!!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="detencion" class="">¿Ha sido detenido y/o sancionado por la Ley de Seguridad en los Estadios, y que esté cumpliendo o haya cumplido?</label>
                        <div class="col-md-6"><div class="form-group">
                            <label> </label>
                            <div class="radio-inline">
                                <label class="radio radio-rounded">
                                <input type="radio" name="detencion" value="Yes" onChange="detencionValue(this)">
                                <span></span>Si</label>
                                <label class="radio radio-rounded">
                                <input type="radio" checked="checked" name="detencion" value="No" onChange="detencionValue(this)">
                                <span></span>No</label>
                            </div>
                            <script type="text/javascript">
                            function detencionValue(x) {
                                if(x.value == 'No'){
                                    document.getElementById("detenido").style.display = 'none';
                                }
                                else{
                                    document.getElementById("detenido").style.display = 'block';
                                }
                            }
                            </script>

                            <div id="detenido" style="display:none;">
                                <span class="form-text text-muted">Indique fechas en caso de ser efectivo.</span>
                               <br>
                               {!!Form::date('detencion',$inscripciones->detencion,['class'=>"form-control", 'placeholder'=>"Ingrese la fecha..."])!!}
                            </div>

                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nombres y apellidos del socio de la C.D.S.C. Everton - Viña del Mar, que lo patrocina y se hace responsable de su ingreso</label>
                        {!!Form::text('socio',$inscripciones->socio,['class'=>"form-control", 'placeholder'=>"Ingrese nombre del socio..." , 'required'])!!}
                    </div>
                    <div class="form-group ">
                        <label for="interes" class="">Relate brevemente, por que está interesado en ingresar a la C.D.S.C Everton - Viña del Mar</label>
                        <textarea name="interes" rows="3" cols="30" class="form-control">{{$inscripciones->interes }}</textarea>

                    </div>
                    <div class="form-group row">
                        <label for="edadconfirm" class="">¿Es menor de edad?</label>
                        <br>
                            <div class="radio-inline">

                                <label class="radio radio-rounded">
                                <input type="radio" name="edadconfirm" value="Yes" onChange="edadconfirmValue(this)">
                                <span></span>Si</label>
                                <label class="radio radio-rounded">
                                <input type="radio" checked="checked" name="edadconfirm" value="No" onChange="edadconfirmValue(this)">
                                <span></span>No</label>
                            </div>
                            <script type="text/javascript">
                            function edadconfirmValue(x) {
                                if(x.value == 'No'){
                                    document.getElementById("menor").style.display = 'none';
                                }
                                else{
                                    document.getElementById("menor").style.display = 'block';
                                }
                            }
                            </script>

                        </div>
                    </div>
                    <div id="menor" style="display:none;">
                        <div class="form-group row">
                            <label for="apoderado" class="">Nombres y parentesco del apoderado que lo representa</label>
                            <div class="col-md-6">
                                {!!Form::text('nombres_apoderado',$inscripciones->nombres_apoderado,['class'=>"form-control", 'placeholder'=>"Ingrese nombre apoderado..." , ])!!}
                              <br>
                                {!!Form::text('parentesco_apoderado',$inscripciones->parentesco_apoderado,['class'=>"form-control", 'placeholder'=>"Ingrese parentesco apoderado..."])!!}
                            <br>
                                <label for="">Rut de Apoderado</label>
                                {!!Form::text('rut_apoderado',$inscripciones->rut_apoderado,['class'=>"form-control", 'placeholder'=>"Ingrese rut apoderado..."])!!}

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cedula de Identidad Delantera</label>

                        <img src="{{ asset('public/cedula_delantera/').'/'.$inscripciones->cedula_delantera }}" height="150" width="150">

                        <input type="file" name="cedula_delantera" class="form-control" placeholder="" value="{{ $inscripciones->cedula_delantera }}">
                        <span class="text-danger">{{ $errors->first('cedula_delantera') }}</span>
                    </div>

                    <div class="form-group">
                        <label>Cedula de Identidad Trasera</label>

                        <img src="{{ asset('public/cedula_trasera/').'/'.$inscripciones->cedula_trasera }}" height="150" width="150">

                        <input type="file" name="cedula_trasera" class="form-control" placeholder="" value="{{ $inscripciones->cedula_trasera }}">
                        <span class="text-danger">{{ $errors->first('cedula_trasera') }}</span>
                    </div>

                    <div class="form-group">
                        <label>Foto Carnet</label>

                        <img src="{{ asset('public/foto_carnet/').'/'.$inscripciones->foto_carnet }}" height="150" width="150">

                        <input type="file" name="foto_carnet" class="form-control" placeholder="" value="{{ $inscripciones->foto_carnet }}">
                        <span class="text-danger">{{ $errors->first('foto_carnet') }}</span>
                    </div>

                    <div class="form-group">
                        <label>Certificado de Antecedentes</label>

                        <img src="{{ asset('public/antecedentes/').'/'.$inscripciones->antecedentes }}" height="150" width="150">

                        <input type="file" name="antecedentes" class="form-control" placeholder="" value="{{ $inscripciones->antecedentes }}">
                        <span class="text-danger">{{ $errors->first('antecedentes') }}</span>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-primary">
                    Actualizar
                </button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>

