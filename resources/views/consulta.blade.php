@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h5 class="card-label">Revisión estado de solicitud de ingreso para socio o socia de la keeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               e                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   </h5>
            </div>
        </div>
        <form method="POST" action="http://localhost/socios/public/private/mantenedor-inscripcion" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="bShEpO9YG69UPhcoZrDrx3MJTe3tq7vrvehLNvaD">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Nombre*</label>
                            <input class="form-control" placeholder="Ingrese su Nombre..." required="" name="name" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Rut*</label>
                            <input class="form-control" placeholder="Ingrese su rut..." required="" name="rut" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Fecha de Nacimiento*</label>
                            <input class="form-control" placeholder="Ingrese su fecha de nacimiento..." required="" name="fnacimiento" type="date">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Edad*</label>
                            <input class="form-control" placeholder="Ingrese su fecha de nacimiento..." required="" name="edad" type="number">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Direccion*</label>
                            <input class="form-control" placeholder="Ingrese su direccion..." required="" name="direccion" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Telefono*</label>
                            <input class="form-control" placeholder="Ingrese su telefono..." required="" name="telefono" type="number">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Correo Electronico*</label>
                            <input class="form-control" placeholder="Ingrese su Correo Electronico..." required="" name="email" type="email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="radio-inline">
                                <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" onchange="Profesion();">
                                    <span></span>Profesión </label>
                                    <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" onchange="Oficio();">
                                    <span></span>Oficio</label>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function Profesion()
                            {
                               var a=  document.getElementById("profesion").style.display="block";
                               a.innerHTML;
                               var b=  document.getElementById("oficio").style.display="none";
                            }
                            function Oficio()
                            {
                                var a=  document.getElementById("profesion").style.display="none";
                                var b=  document.getElementById("oficio").style.display="block";
                                b.innerHTML;
                            }
                        </script>
                        <div id="profesion" style="display: none;">
                            <div class="form-group">
                                <label for="">Profesión</label>
                                <input class="form-control" placeholder="Ingrese su Profesion..." name="profesion" type="text">
                            </div>
                        </div>
                        <div id="oficio" style="display: none;">
                            <div class="form-group">
                                <label for="">Oficio</label>
                                <input class="form-control" placeholder="Ingrese su oficio..." name="oficio" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Estudios(Estudios Aprobados)</label>
                            <select class="form-control" id="estudios" name="estudios">
                                <option value="">Seleccione...</option>
                                <option value="Enseñanza Básica">Enseñanza Básica</option>
                                <option value="Enseñanza Media">Enseñanza Media</option>
                                <option value="Enseñanza Nivel Superior">Enseñanza Nivel Superior</option>
                                <option value="ninguna">Ninguna</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="">Rama a Integrar</label>
                            <select class="form-control" id="rama" name="rama">
                                <option value="">Seleccione...</option>
                                <option value="deportiva">Deportiva</option>
                                <option value="cultural">Cultural</option>
                                <option value="social">Social</option>
                                <option value="ninguna">Ninguna</option>
                            </select>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="">¿Pertenece a alguna institución o agrupación en la actualidad?</label>
                            <div class="radio-inline">
                                <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" value="Yes" onchange="perteneceValue(this)">
                                    <span></span>Si</label>
                                    <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" value="No" onchange="perteneceValue(this)">
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
                                <div class="row">
                                <div class="col-4">
                                    <label for="">Nombre Institución*</label>
                                    <input class="form-control" placeholder="Ingrese institucion o agrupación..." name="nombre_institucion" type="text">
                                </div>
                                <div class="col-4">
                                    <label for="">Telefono Institución*</label>
                                    <input class="form-control" placeholder="Ingrese fono..." name="fono_institucion" type="number">
                                </div>
                                <div class="col-4">
                                    <label for="">Correo Institución*</label>

                                    <input class="form-control" placeholder="Ingrese correo..." name="email_institucion" type="email">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="">¿Ha sufrido alguna sanción y/o pena aflictiva?</label>
                            <div class="radio-inline">
                                <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" value="Yes" onchange="sancionValue(this)">
                                    <span></span>Si</label>
                                    <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" value="No" onchange="sancionValue(this)">
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
                            <br>
                            <div id="sancionado" style="display:none;">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Fecha Inicial</label>
                                        <input class="form-control" placeholder="Ingrese la fecha..." name="sancion_comienzo" type="date">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Fecha Termino</label>
                                        <input class="form-control" placeholder="Ingrese la fecha..." name="sancion_termino" type="date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="detencion" class="">¿Ha sido detenido y/o sancionado por la Ley de Seguridad en los Estadios, y que esté cumpliendo o haya cumplido?</label>                            <div class="radio-inline">
                                <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" value="Yes" onchange="detencionValue(this)">
                                    <span></span>Si</label>
                                    <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" value="No" onchange="detencionValue(this)">
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
                            <br>
                            <div id="detenido" style="display:none;">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Fecha Inicial</label>
                                        <input class="form-control" placeholder="Ingrese la fecha..." name="detencion_comienzo" type="date">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Fecha Termino</label>
                                        <input class="form-control" placeholder="Ingrese la fecha..." name="detencion_termino" type="date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Nombres y apellidos del socio de la C.D.S.C. Everton - Viña del Mar, que lo patrocina y se hace responsable de su ingreso</label>
                            <input class="form-control" placeholder="Ingrese nombre del socio..." required="" name="socio" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interes" class="">Relate brevemente, por que está interesado en ingresar a la C.D.S.C Everton - Viña del Mar</label>
                            <textarea name="interes" id="interes" cols="30" rows="3" class="form-control "></textarea>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="">¿Es menor de edad?</label>
                            <div class="radio-inline">
                                <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" value="Yes" onchange="edadconfirmValue(this)">
                                    <span></span>Si</label>
                                    <label class="radio radio-rounded">
                                    <input type="radio" name="institucion" value="No" onchange="edadconfirmValue(this)">
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
                            <br>
                            <div id="menor" style="display:none;">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="">Nombre Apoderado</label>
                                        <input class="form-control" placeholder="Ingrese nombre apoderado..." name="nombres_apoderado" type="text">                                    </div>
                                    <div class="col-4">
                                        <label for="">Parentesco Apoderado</label>
                                        <select class="form-control" id="parentesco" name="parentesco_apoderado">
                                            <option value="">Seleccione...</option>
                                            <option value="Padres">Padres</option>
                                            <option value="Hermanos/as">Hermanos/as</option>
                                            <option value="Abuelos/as">Abuelos/as</option>
                                            <option value="Tios/as">Tios/as</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="">Rut de Apoderado</label>
                                        <input class="form-control" placeholder="Ingrese rut apoderado..." name="rut_apoderado" type="text">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <label for="">Rut del Representante</label>
                                        <input class="form-control" placeholder="Ingrese rut apoderado..." name="rut_representante" type="text">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <label for="">Rut del Patrocinante</label>
                                        <input class="form-control" placeholder="Ingrese rut apoderado..." name="rut_patrocinante" type="text">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <label for="">Fecha de Recepción  por la Comisión </label>
                                        <input class="form-control" placeholder="Ingrese rut apoderado..." name="fecha_comision" type="date">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <br>
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#mensaje">Información por la Comisión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Cedula de Identidad Delantera</label>
                            <input type="file" name="cedula_delantera" class="form-control" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Cedula de Identidad Trasera</label>
                            <input type="file" name="cedula_trasera" class="form-control" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Foto Carnet</label>
                            <input type="file" name="foto_carnet" class="form-control" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Certificado de antecedentes</label>
                            <input type="file" name="antecedentes" class="form-control" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>




                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <button class="btn btn-primary font-weight-bold mr-2">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
