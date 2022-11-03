@extends('layouts.superadmin.master')
@section('content')
@include('layouts.notificacion')

<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Mobile Toggle-->
            <div class="d-flex align-items-baseline mr-5">
                <h5 class="text-dark font-weight-bold my-2 mr-5">Solicitud de Inscripcion como Socio o Socio</h5>
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">Socios</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Solicitud de Inscripcion como Socio o Socio
            </div>
            <div class="card-body table-responsive">
                <br>
                <br>
                <table class="table table-bordered table-checkable" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Rut</th>
                            <th>Correo Electronico</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($inscripcion as $inscripciones)
                        <tr>
                            <th>{{$inscripciones->id}}</th>
                            <th>{{$inscripciones->name}}</th>
                            <th>{{$inscripciones->rut}}</th>
                            <th>{{$inscripciones->email}}</th>

                          
                               @if ($inscripciones->estado == NULL)
                                   <th>
                                       <p>sin estado</p>
                                   </th>
                                @elseif ($inscripciones->estado->id == 1)
                                    <th> 
                                        <p style="color : {{ $inscripciones->estado->color }}"> {{$inscripciones->estado->nombre}}</p>
                                    </th>
                                @elseif ($inscripciones->estado->id == 2)
                                    <th> 
                                        <p style="color : {{ $inscripciones->estado->color }}"> {{$inscripciones->estado->nombre}}</p>
                                    </th>
                                @elseif ($inscripciones->estado->id == 3)
                                    <th> 
                                        <p style="color : {{ $inscripciones->estado->color }}"> {{$inscripciones->estado->nombre}}</p>
                                    </th>
                                @elseif ($inscripciones->estado->id == 5)
                                    <th> 
                                        <p style="color : {{ $inscripciones->estado->color }}"> {{$inscripciones->estado->nombre}}</p>
                                    </th>
                                @elseif ($inscripciones->estado->id == 7)
                                    <th> 
                                        <p style="color : {{ $inscripciones->estado->color }}"> {{$inscripciones->estado->nombre}}</p>
                                    </th>
                               @endif

                            <th>
                                <div class="dropdown dropdown-inline mr-2">
                                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones</button>
                                    <!--begin::Dropdown Menu-->
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <ul class="nav flex-column nav-hover">
                                            <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">&nbsp; Escoge una opción:</li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit{{$inscripciones->id}}">Editar</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editar{{$inscripciones->id}}">Estados</a>
                                                @include('private.superadmin.inscripcion.destroy')
                                                <a class="dropdown-item" href="{{ asset('private/superadmin/inscripcion/'.$inscripciones->id) }}">Ver</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end::Dropdown Menu-->
                                </div>
                            </th>
<<<<<<< HEAD
=======
                            <th>@if ($inscripciones->pago == NULL)
                            <a href="#" data-toggle="modal" data-target="#agregarpagomodal{{$inscripciones->id}}">Crear Pago</a>                       
                            
                            @else
                              <a href="">Pendiente pago</a>
                              @php
                                  
                              @endphp                              
                            
                            @endif</th>
>>>>>>> 572150f7ee5449161874d8eca704513818890dc2
                            @include('private.superadmin.inscripcion.estado')
                            @include('private.superadmin.inscripcion.edit')
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

