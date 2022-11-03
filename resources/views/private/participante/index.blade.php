@extends('layouts.participante')
@section('content')
@php
    setlocale(LC_TIME, "spanish");
@endphp
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-box-1 text-success"></i>
            </span>
            <h3 class="card-label">MIS JUEGOS</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row my-10">
            @foreach ($bingos_cantor as $bingo)
                @if($bingo->estado_id != 2)
                    <div class="col-xl-4">
                        <div class="card card-custom gutter-b card-stretch border">
                            <div class="card-body pt-4 d-flex flex-column justify-content-between">
                                <div class="d-flex align-items-center mb-7">
                                <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                    <div class="symbol symbol-lg-75 d-none">
                                        <img alt="Pic" src="assets/media/users/300_10.jpg">
                                    </div>
                                    <div class="symbol symbol-lg-75 symbol-primary">
                                        <span class="symbol-label font-size-h3 font-weight-boldest">BINGO</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{$bingo->nombre}}</a>
                                    <span class="text-muted font-weight-bold">Organiza: {{ $bingo->user->name }}</span>
                                </div>
                                </div>
                                <h3><a class="text-primary pr-1">#{{$bingo->codigo}}</a></h3>
                                <p class="mb-7">{{$bingo->descripcion}}</p>
                                <div class="mb-7">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Correo:</span>
                                    <a href="#" class="text-muted text-hover-primary">{{$bingo->user->email}}</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-cente my-1">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Teléfono:</span>
                                    <a href="#" class="text-muted text-hover-primary">+569412653</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Ubicación:</span>
                                    <span class="text-muted font-weight-bold">Viña del Mar</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Fecha:</span>
                                    @php
                                        setlocale(LC_TIME, 'es_ES.UTF-8');
                                        $fecha = strftime('%a %d de %B de %Y - %H:%M', strtotime($bingo->fecha_inicio));
                                    @endphp
                                    <span class="text-muted font-weight-bold">{{ $fecha }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Estado:</span>
                                    <span class="text-muted font-weight-bold">{{ $bingo->estado->nombre}}</span>
                                </div>
                                </div>
                            <div class="mt-2">
                                <a href="{{asset('private/bingo/jugar/cantor/'.$bingo->codigo)}}" class="btn btn-primary float-left">CANTAR</a>
                                <div class="dropdown float-right">
                                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="{{asset('private/bingo/ver/'.$bingo->codigo)}}" class="dropdown-item">Ver</a>
                                        <a href="{{asset('private/bingo/administrar/'.$bingo->codigo)}}" class="dropdown-item">Administrar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($bingos_participante as $bingo)
                @if($bingo->estado_id != 2)
                    <div class="col-xl-4">
                        <div class="card card-custom gutter-b card-stretch border">
                            <div class="card-body pt-4 d-flex flex-column justify-content-between">
                                <div class="d-flex align-items-center mb-7">
                                    <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                        <div class="symbol symbol-lg-75 d-none">
                                            <img alt="Pic" src="assets/media/users/300_10.jpg">
                                        </div>
                                        <div class="symbol symbol-lg-75 symbol-primary">
                                            <span class="symbol-label font-size-h3 font-weight-boldest">BINGO</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{$bingo->nombre}}</a>
                                        <span class="text-muted font-weight-bold">Organiza: {{ $bingo->user->name }}</span>
                                    </div>
                                </div>
                                <h3><a class="text-primary pr-1">#{{$bingo->codigo}}</a></h3>
                                <p class="mb-7">{{$bingo->descripcion}}</p>
                                <div class="mb-7">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 font-weight-bolder mr-2">Correo:</span>
                                        <a href="#" class="text-muted text-hover-primary">{{$bingo->user->email}}</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-cente my-1">
                                        <span class="text-dark-75 font-weight-bolder mr-2">Teléfono:</span>
                                        <a href="#" class="text-muted text-hover-primary">+569412653</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 font-weight-bolder mr-2">Ubicación:</span>
                                        <span class="text-muted font-weight-bold">Viña del Mar</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 font-weight-bolder mr-2">Fecha:</span>
                                        @php
                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                            $fecha = strftime('%a, %d de %B de %Y - %H:%M', strtotime($bingo->fecha_inicio));
                                        @endphp
                                        <span class="text-muted font-weight-bold">{{ $fecha }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-dark-75 font-weight-bolder mr-2">Estado:</span>
                                        <span class="text-muted font-weight-bold">{{ $bingo->estado->nombre}}</span>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <a href="{{asset('private/bingo/jugar/me/'.$bingo->codigo)}}" class="btn btn-sm btn-primary font-weight-bold py-2 px-3 px-xxl-5 my-1 mx-3">INGRESAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</div>

@endsection
