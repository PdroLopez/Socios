@extends('layouts.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<div class="container">

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert" id="success">
            {!! Session::get('success') !!}
        </div>
    @endif
    <script type="text/javascript">
        setTimeout(function() {
            $('#success').fadeOut('fast');
        }, 5000);
    </script>

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                @if(Session::has('mensaje'))
                <div class="col-10 mt-5 mb-0 ml-auto mr-auto alert alert-custom alert-{{ Session::get('mensaje')['type'] }} fade show" role="alert" style="height: 60px;">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">{{ Session::get('mensaje')['content'] }}</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">{{-- <i class="ki ki-close"></i> --}}</span>
                        </button>
                    </div>
                </div>
            @endif

                <h5 class="card-label">Solicitud de Inscripcion como Socio o Socio</h5>

            </div>
        </div>

    </div>

    {!!Form::open(['route' => 'mantenedor-inscripcion.store', 'method' => 'POST','files'=>true])!!}
    <div class="card-body">
        <h2>Datos Personales</h2>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Nombre*</label>
                    {!!Form::text('name',null,['class'=>"form-control", 'placeholder'=>"Ingrese su Nombre..." , 'required'])!!}
                </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                  <label for="">Rut*</label>
                  {!!Form::text('rut',null,['class'=>"form-control", 'placeholder'=>"Ingrese su rut..." , 'required'])!!}
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label for="">Fecha de Nacimiento*</label>
                  {!!Form::date('fnacimiento',null,['class'=>"form-control", 'placeholder'=>"Ingrese su fecha de nacimiento..." , 'required'])!!}
              </div>
          </div>
          {{-- <div class="col-6">
              <div class="form-group">
                  <label for="">Edad*</label>
                  {!!Form::number('edad',null,['class'=>"form-control", 'placeholder'=>"Ingrese su fecha de nacimiento..." , 'required'])!!}
              </div>
          </div>--}}

          <div class="col-6">
              <div class="form-group">
                  <label for="">Direccion*</label>
                  {!!Form::text('direccion',null,['class'=>"form-control", 'placeholder'=>"Ingrese su direccion..." , 'required'])!!}
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label for="">Telefono*</label>
                  {!!Form::number('telefono',null,['class'=>"form-control", 'placeholder'=>"Ingrese su telefono..." , 'required'])!!}
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label for="">Correo Electronico*</label>
                  {!!Form::email('email',null,['class'=>"form-control", 'placeholder'=>"Ingrese su Correo Electronico..." , 'required'])!!}
              </div>
          </div>
          {{--  <div class="col-12">
              <div class="form-group">
                  <div class="radio-inline">
                      <label class="radio radio-rounded">
                          <input type="radio"  name="empleo"  id="profesion"  onChange="Profesion();">
                          <span></span>Profesión </label>
                          <label class="radio radio-rounded">
                          <input type="radio" name="empleo"   id="oficio" onChange="Oficio();">
                          <span></span>Oficio</label>
                  </div>
              </div>
              <script type="text/javascript">
                  function Profesion()
                  {
                     var a=  document.getElementById("p").style.display="block";
                     a.innerHTML;
                     var b=  document.getElementById("o").style.display="none";
                  }
                  function Oficio()
                  {
                      var a=  document.getElementById("p").style.display="none";
                      var b=  document.getElementById("o").style.display="block";
                      b.innerHTML;
                  }
              </script>
              <div id="p" style="display: none;">
                  <div class="form-group">
                      <label for="">Profesión</label>
                      {!!Form::text('profesion',null,['class'=>"form-control", 'placeholder'=>"Ingrese su Profesion..."])!!}
                  </div>
              </div>
              <div id="o" style="display: none;">
                  <div class="form-group">
                      <label for="">Oficio</label>
                      {!!Form::text('oficio',null,['class'=>"form-control", 'placeholder'=>"Ingrese su oficio..."])!!}
                  </div>
              </div>
          </div>--}}

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
                      <option value="todas">Todas</option>
                      <option value="ninguna">Ninguna</option>
                  </select>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="">Cedula de Identidad Delantera</label>
                <input type="file" name="cedula_delantera" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Cedula de Identidad Trasera</label>
                <input type="file" name="cedula_trasera" class="form-control" placeholder="">
            </div>
        </div>
        <button class="btn btn-primary font-weight-bold mr-2">Enviar</button>



            @if ($codigo != null)

                <a class="btn btn-info" href="{{asset('inscripcion-paso-3')}}/{{ $codigo }}" name="password" value="siguiente">Siguiente</a>

            @else

            @endif
{{--
 --}}


          {!! Form::close() !!}




        </div>
    </div>


</div>
{{--@foreach ($inscripcion as $inscripciones)
     <div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h5 class="card-label">Solicitud de Inscripcion como Socio o Socio</h5>
            </div>
        </div>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
    </div>
    {!! Form::open(['route' => ['mantenedor-inscripcion.update',$inscripciones->id],'files'=>true, 'method' => 'PUT']) !!}
    <div class="card-body">
      <fieldset >

        <div class="row">
            <div class="col-12">
                <h2>Datos Personales</h2>


            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="">Nombre*</label>
                    {!!Form::text('name',$inscripciones->name,['class'=>"form-control", 'placeholder'=>"Ingrese su Nombre..."])!!}
                </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                  <label for="">Rut*</label>
                  {!!Form::text('rut',$inscripciones->rut,['class'=>"form-control", 'placeholder'=>"Ingrese su rut..."])!!}
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label for="">Fecha de Nacimiento*</label>
                  {!!Form::date('fnacimiento',$inscripciones->fnacimiento,['class'=>"form-control", 'placeholder'=>"Ingrese su fecha de nacimiento..."])!!}
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label for="">Edad*</label>
                  {!!Form::number('edad',$inscripciones->edad,['class'=>"form-control", 'placeholder'=>"Ingrese su fecha de nacimiento..."])!!}
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label for="">Direccion*</label>
                  {!!Form::text('direccion',$inscripciones->direccion,['class'=>"form-control", 'placeholder'=>"Ingrese su direccion..."])!!}
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label for="">Telefono*</label>
                  {!!Form::number('telefono',$inscripciones->telefono,['class'=>"form-control", 'placeholder'=>"Ingrese su telefono..." ])!!}
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label for="">Correo Electronico*</label>
                  {!!Form::email('email',$inscripciones->email,['class'=>"form-control", 'placeholder'=>"Ingrese su Correo Electronico..."])!!}
              </div>
          </div>
          <div class="col-12">
              <div class="form-group">
                  <div class="radio-inline">
                      <label class="radio radio-rounded">
                          <input type="radio"  name="empleo"  id="profesion"  onChange="Profesion();">
                          <span></span>Profesión </label>
                          <label class="radio radio-rounded">
                          <input type="radio" name="empleo"   id="oficio" onChange="Oficio();">
                          <span></span>Oficio</label>
                  </div>
              </div>
              <script type="text/javascript">
                  function Profesion()
                  {
                     var a=  document.getElementById("p").style.display="block";
                     a.innerHTML;
                     var b=  document.getElementById("o").style.display="none";
                  }
                  function Oficio()
                  {
                      var a=  document.getElementById("p").style.display="none";
                      var b=  document.getElementById("o").style.display="block";
                      b.innerHTML;
                  }
              </script>
              <div id="p" style="display: none;">
                  <div class="form-group">
                      <label for="">Profesión</label>
                      {!!Form::text('profesion',$inscripciones->profesion,['class'=>"form-control", 'placeholder'=>"Ingrese su Profesion..."])!!}
                  </div>
              </div>
              <div id="o" style="display: none;">
                  <div class="form-group">
                      <label for="">Oficio</label>
                      {!!Form::text('oficio',$inscripciones->oficio,['class'=>"form-control", 'placeholder'=>"Ingrese su oficio..."])!!}
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

          <a class="next btn btn-info"  name="password" value="siguiente">Siguiente</a>
          <button class="btn btn-primary font-weight-bold mr-2">Enviar</button>



        </div>
        {!! Form::close() !!}
        <fieldset style="display: none;">
          <h2>Responda las siguientes Preguntas</h2>

          <div class="form-group">
              <label for="" class="">¿Pertenece a alguna institución o agrupación en la actualidad?</label>
              <div class="radio-inline">
                  <label class="radio radio-rounded">
                      <input type="radio" name="pertenece" value="Yes" onChange="perteneceValue(this)">
                      <span></span>Si</label>
                      <label class="radio radio-rounded">
                      <input type="radio" name="pertenece" value="No" onChange="perteneceValue(this)">
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
                      {!!Form::text('nombre_institucion',$inscripciones->nombre_institucion,['class'=>"form-control", 'placeholder'=>"Ingrese institucion o agrupación..."])!!}
                  </div>
                  <div class="col-4">
                      <label for="">Telefono Institución*</label>
                      {!!Form::number('fono_institucion',$inscripciones->fono_institucion,['class'=>"form-control", 'placeholder'=>"Ingrese fono..."])!!}
                  </div>
                  <div class="col-4">
                      <label for="">Correo Institución*</label>

                      {!!Form::email('email_institucion',$inscripciones->email_institucion,['class'=>"form-control", 'placeholder'=>"Ingrese correo..."])!!}
                  </div>
                  </div>
              </div>
          </div>
          <div class="form-group">
              <label for="" class="">¿Ha sufrido alguna sanción y/o pena aflictiva?</label>
              <div class="radio-inline">
                  <label class="radio radio-rounded">
                      <input type="radio" name="sansion" value="Yes" onChange="sancionValue(this)">
                      <span></span>Si</label>
                      <label class="radio radio-rounded">
                      <input type="radio" name="sansion" value="No" onChange="sancionValue(this)">
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
                          {!!Form::date('sancion_comienzo',$inscripciones->sancion_comienzo,['class'=>"form-control", 'placeholder'=>"Ingrese la fecha..."])!!}
                      </div>
                      <div class="col-6">
                          <label for="">Fecha Termino</label>
                          {!!Form::date('sancion_termino',$inscripciones->sancion_termino,['class'=>"form-control", 'placeholder'=>"Ingrese la fecha..."])!!}
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-group">
              <label for="detencion" class="">¿Ha sido detenido y/o sancionado por la Ley de Seguridad en los Estadios, y que esté cumpliendo o haya cumplido?</label>                            <div class="radio-inline">
                  <label class="radio radio-rounded">
                      <input type="radio" name="detencion" value="Yes" onChange="detencionValue(this)">
                      <span></span>Si</label>
                      <label class="radio radio-rounded">
                      <input type="radio" name="detencion" value="No" onChange="detencionValue(this)">
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
                          {!!Form::date('detencion_comienzo',$inscripciones->detencion_comienzo,['class'=>"form-control", 'placeholder'=>"Ingrese la fecha..."])!!}
                      </div>
                      <div class="col-6">
                          <label for="">Fecha Termino</label>
                          {!!Form::date('detencion_termino',$inscripciones->detencion_termino,['class'=>"form-control", 'placeholder'=>"Ingrese la fecha..."])!!}
                      </div>
                  </div>
              </div>
          </div>

              <div class="form-group">
                  <label for="" class="">¿Es menor de edad?</label>
                  <div class="radio-inline">
                      <label class="radio radio-rounded">
                          <input type="radio" name="edad" value="Yes" onChange="edadconfirmValue(this)">
                          <span></span>Si</label>
                          <label class="radio radio-rounded">
                          <input type="radio" name="edad" value="No" onChange="edadconfirmValue(this)">
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
                              {!!Form::text('nombres_apoderado',$inscripciones->nombre_apoderado,['class'=>"form-control", 'placeholder'=>"Ingrese nombre apoderado..." , ])!!}                                    </div>
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
                              {!!Form::text('rut_apoderado',$inscripciones->rut_apoderado,['class'=>"form-control", 'placeholder'=>"Ingrese rut apoderado..."])!!}
                          </div>
                          <div class="col-6">
                              <br>
                              <label for="">Rut del Representante</label>
                              {!!Form::text('rut_representante',$inscripciones->rut_representante,['class'=>"form-control", 'placeholder'=>"Ingrese rut apoderado..."])!!}
                          </div>
                          <div class="col-6">
                              <br>
                              <label for="">Rut del Patrocinante</label>
                              {!!Form::text('rut_patrocinante',$inscripciones->rut_patrocinante,['class'=>"form-control", 'placeholder'=>"Ingrese rut apoderado..."])!!}
                          </div>
                          <div class="col-6">
                              <br>
                              <label for="">Fecha de Recepción  por la Comisión </label>
                              {!!Form::date('fecha_comision',null,['class'=>"form-control", 'placeholder'=>"Ingrese rut apoderado..."])!!}
                          </div>
                          <div class="col-6">
                              <br>
                              <br>
                              <a href="#" class="btn btn-info"  data-toggle="modal" data-target="#mensaje">Información por la Comisión</a>
                          </div>
                      </div>
                  </div>
              </div>


          <input type="button" name="previous" class="previous btn btn-default" value="Atrás" />
          <a class="btn btn-info" href="{{asset('terminar/inscripcion')}}/{{ $inscripciones->codigo_inscripcion }}" name="password" value="siguiente">Siguiente</a>          <button class="btn btn-primary font-weight-bold mr-2">Enviar</button>


         </fieldset>


      </fieldset>
      <fieldset>

      </fieldset>
    </div>
  </div>

@endforeach--}}




<style type="text/css">
  #regiration_form fieldset:not(:first-of-type) {
    display: none;

</style>


<script >
    $(document).ready(function(){
        var current = 1,current_step,next_step,steps;
        steps = $("fieldset").length;
        $(".next").click(function(){
          current_step = $(this).parent();
          next_step = $(this).parent().next();
          next_step.show();
          current_step.hide();
          setProgressBar(++current);
        });
        $(".previous").click(function(){
          current_step = $(this).parent();
          next_step = $(this).parent().prev();
          next_step.show();
          current_step.hide();
          setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action
        function setProgressBar(curStep){
          var percent = parseFloat(100 / steps) * curStep;
          percent = percent.toFixed();
          $(".progress-bar")
            .css("width",percent+"%")
            .html(percent+"%");
        }
      });

</script>



@endsection
