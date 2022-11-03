@extends('layouts.master')
@section('content')
@php
    setlocale(LC_TIME, "spanish");
@endphp
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<div class="flex-row-lg-fluid ml-lg-12">
    <div class="container mb-4">
        <form action="{{ asset('bingos/busqueda') }}" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Buscar bingo"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary mx-4">
                      <i class="ml-1 flaticon2-search-1 text-light"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
    <div class="row">
        @foreach ($bingos as $bingo)
            @if($bingo->estado_id != 2)
                <div class="col-xl-4">
                    <div class="card card-custom gutter-b card-stretch">
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
                                    <span class="text-dark-75 font-weight-bolder mr-2">Boletos:</span>
                                    <span class="text-muted font-weight-bold">{{$bingo->n_boletos}}</span>
                                </div>
                                <br>
                                @if ($bingo->precio == null)
                                    <a class="text-dark font-weight-bold text-hover-primary font-size-h2 mb-0">GRATIS</a>
                                @else
                                    <a class="text-dark font-weight-bold text-hover-primary font-size-h2 mb-0">$ {{$bingo->precio}} CL</a>
                                @endif
                            </div>
                            <div class="mt-2">
                                @if ($bingo->precio == null)
                                    <a href="{{asset('bingos/comprar/'.$bingo->codigo)}}" class="btn btn-sm btn-warning font-weight-bold py-2 px-3 px-xxl-5 my-1">COMPRAR CARTONES GRATIS</a>
                                @else
                                    <a href="{{asset('bingos/comprar/'.$bingo->codigo)}}" class="btn btn-sm btn-warning font-weight-bold py-2 px-3 px-xxl-5 my-1">COMPRAR CARTONES</a>
                                @endif
                                <a href="{{asset('private/bingo/ver/'.$bingo->codigo)}}" class="btn btn-sm btn-warning font-weight-bold py-2 px-3 px-xxl-5 my-1 ml-13 mr-2 float-right">VER</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<div class="card card-custom">
<div class="card-body">
<!--begin::Pagination-->
<div class="d-flex justify-content-between align-items-center flex-wrap">
<div class="d-flex flex-wrap mr-3">

</div>
</div>
<!--end:: Pagination-->
</div>
</div>
@endsection
