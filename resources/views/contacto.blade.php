@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h5 class="card-label">Contáctanos</h5>
            </div>
        </div>
        {!!Form::open(['route' => 'mantenedor-contacto.store', 'method' => 'POST','files'=>true])!!}
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text"  name="nombre" class="form-control form-control-solid form-control-lg" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" class="form-control form-control-solid form-control-lg" placeholder="Ingresa tu número">
                    </div>
                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" name="email" class="form-control form-control-solid form-control-lg" placeholder="Ingresa tu correo">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">Ingresa tu Mensaje</label>
                        <textarea class="form-control form-control-solid form-control-lg" name="mensaje" id="exampleTextarea" rows="3"></textarea>
                        <p class="m-4" style="color:gray;">Nunca compartiremos tus datos con otra persona</p>
                    </div>
                </div>
                <div class="col-xl-3"></div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <button type="botton" class="btn btn-primary font-weight-bold mr-2">Enviar</button>
                    {{-- <button type="reset" class="btn btn-clean font-weight-bold">Cancelar</button> --}}
                </div>
                <div class="col-xl-3"></div>
            </div>
        </div>



        {!!Form::close()!!}
    </div>
    @include('servicios')
</div>
@stop
