@extends('layouts.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@foreach ($inscripcion as $inscripciones)

<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h5 class="card-label">Solicitud de Inscripcion como Socio o Socio</h5>
            </div>
        </div>
    </div>

    <div class="card-body">

        <fieldset>
            <h2 style="text-align: center"> Estimado/a {{ $inscripciones->name }}, la Inscripcion  de Socios de la Corporación Deportiva y Cultural de Everton de Viña del Mar ah sido finalizada</h2>

            <center>
                <a class="btn btn-info" href="{{asset('inscripcion-finalizada')}}" name="password" value="siguiente">Finalizar</a>

            </center>

        </fieldset>
    </div>
</div>
@endforeach
@endsection
