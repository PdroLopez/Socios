@extends('layouts.master')
@section('content')

<style>
    .title-bingo{
        font-size: 10px;
    }

    .bingo-background-sm{
        display: none;
    }

    .bingo-background-md{
        display: none;
    }

    .bingo-background{
        display: none;
    }

   
    @media screen and (min-width: 300px) {
        .title-bingo{
            font-size: 50px;
        }

        .bingo-background-sm{
            display: block;
        }

        .bingo-background-md{
            display: none;
        }
        
        .bingo-background{
            display: none;
        }
        
    }

    @media screen and (min-width: 751px) {
        .title-bingo{
            font-size: 70px;
        }

        .bingo-background-sm{
            display: none;
        }

        .bingo-background-md{
            display: block;
        }
        
        .bingo-background{
            display: none;
        }

        .font-size-h1{
            font-size: 20px !important;
        }
    }

    @media screen and (min-width: 1200px) {
        .title-bingo{
            font-size: 100px;
        }

        .bingo-background-sm{
            display: none;
        }

        .bingo-background-md{
            display: none;
        }
        
        .bingo-background{
            display: block;
        }

    }

</style>
<div class="container">
    <div class="bingo-background row bgi-size-cover bgi-position-center" style="background: url({{asset('img/undraw_mention_6k5d.svg')}}) no-repeat center; background-size: contain; background-position: right;">
        <h1 class="col-12 error-title font-weight-boldest text-info mt-10 mt-md-0 mb-12 title-bingo" style="color: #032273 !important;">Portal socios/as</h1>
        <div class="col-lg-6 col-12 m-0 row">
            <div class="col-12 row">
                <p class="font-size-h1 font-weight-boldest text-dark-75">Corporación Deportiva Social y Cultural Everton</p>
                <p class="font-size-h4 line-height-md">Hazte socio o socia y explora todo los beneficios que tendrémos para ti y su familia</p>
            </div>
        </div>
        <div class="example-preview row col-12 m-0">
            <a href="{{asset('inscripcion')}}" class="btn btn-danger btn-shadow font-weight-bold mr-7 mt-md-4 mt-3">Quiero ser socio!</a>
            <a href="{{asset('donacion')}}" class="btn btn-warning btn-shadow font-weight-bold mr-7 mt-md-4 mt-3">Quiero donar!</a>
        </div>
    </div>



    <div class="container m-0 bingo-background-sm row">
        <h1 class="col-12 font-weight-boldest text-info title-bingo" style="text-align:center; white-space: nowrap; color: #032273 !important; ">Portal socios </h1>
        <div class="container">
            <div class="bgi-size-cover bgi-position-center mr-15 mt-6" style="background: url({{asset('img/undraw_mention_6k5d.png')}}) no-repeat center; background-size: contain; background-position: center; height: 100px;">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 m-0 row">
                <div class="col-12 row">
                    <p class="col-12 font-size-h1 font-weight-boldest text-dark-75">Corporación Deportiva Social y Cultural Everton</p>
                    <p class="col-12 font-size-h4 line-height-md">Hazte socio o socia y explora todo los beneficios que tendrémos para ti y su familia</p>
                </div>
            </div>
            <div class="example-preview row col-12 m-0">
                <a href="{{asset('inscripcion')}}" class="btn btn-danger btn-shadow font-weight-bold mr-7 mt-md-4 mt-3">Quiero ser socio!</a>
                <a href="{{asset('donacion')}}" class="btn btn-warning btn-shadow font-weight-bold mr-7 mt-md-4 mt-3">Quiero donar!</a>
            </div>
        </div>
    </div>

    <div class="bingo-background-md row bgi-size-cover bgi-position-center" style="background: url({{asset('img/fondo.png')}}) no-repeat center; background-size: contain; background-position: right;">
        <h1 class="col-12 error-title font-weight-boldest text-info mt-10 mt-md-0 mb-12 title-bingo">Portal Socios</h1>
        <div class="col-lg-6 col-12 m-0 row">
            <div class="col-12 row">
                <p class="col-12 font-size-h1 font-weight-boldest text-dark-75">Corporación Deportiva Social y Cultural Everton</p>
                <p class="col-12 font-size-h4 line-height-md">Hazte socio o socia y explora todo los beneficios que tendrémos para ti y su familia</p>
            </div>
        </div>
        <div class="example-preview row col-12 m-0">
            <a href="{{asset('inscripcion')}}" class="btn btn-danger btn-shadow font-weight-bold mr-7 mt-md-4 mt-3">Quiero ser socio!</a>
            <a href="{{asset('donacion')}}" class="btn btn-warning btn-shadow font-weight-bold mr-7 mt-md-4 mt-3">Quiero donar!</a>
        </div>
    </div>



    @include('servicios')
</div>

@stop
