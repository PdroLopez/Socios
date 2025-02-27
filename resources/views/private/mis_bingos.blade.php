@extends('layouts.master')
@section('content')

    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="subheader py-2 py-lg-4  subheader-transparent " id="kt_subheader">
                <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                    <div class="d-flex align-items-center flex-wrap mr-2">
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                          Mi Portal de Bingos
                        </h5>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200">
                        </div>
                            <div class="d-flex align-items-center" id="kt_subheader_search">
                                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                                {{ $i }} Total                                    </span>
                                <form class="ml-5">
                                <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                                <input type="text" class="form-control" id="kt_subheader_search_form" placeholder="Ingrese codigo de bingo">
                                <div class="input-group-append">
                                <span class="input-group-text">
                                <span class="svg-icon"><!--begin::Svg Icon | path:/metronic/themes/metronic/theme/html/demo5/dist/assets/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                                </svg><!--end::Svg Icon--></span>                                    <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                                </span>
                                </div>
                                </div>
                                </form>
                            </div>
                            <div class="d-flex- align-items-center flex-wrap mr-2 d-none" id="kt_subheader_group_actions">
                                <div class="text-dark-50 font-weight-bold">
                                <span id="kt_subheader_group_selected_rows">23</span> Selected:
                                </div>
                            <div class="d-flex ml-6">
                            <div class="dropdown mr-2" id="kt_subheader_group_actions_status_change">
                                <button type="button" class="btn btn-light-primary font-weight-bolder btn-sm dropdown-toggle" data-toggle="dropdown">
                                Update Status
                                </button>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-sm">
                                        <ul class="navi navi-hover pt-3 pb-4">
                                        <li class="navi-header font-weight-bolder text-uppercase text-primary font-size-lg pb-0">
                                        Change status to:
                                        </li>
                                        <li class="navi-item">
                                        <a href="#" class="navi-link" data-toggle="status-change" data-status="1">
                                            <span class="navi-text"><span class="label label-light-success label-inline font-weight-bold">Approved</span></span>
                                        </a>
                                        </li>
                                        <li class="navi-item">
                                        <a href="#" class="navi-link" data-toggle="status-change" data-status="2">
                                            <span class="navi-text"><span class="label label-light-danger label-inline font-weight-bold">Rejected</span></span>
                                        </a>
                                        </li>
                                        <li class="navi-item">
                                        <a href="#" class="navi-link" data-toggle="status-change" data-status="3">
                                            <span class="navi-text"><span class="label label-light-warning label-inline font-weight-bold">Pending</span></span>
                                        </a>
                                        </li>
                                        <li class="navi-item">
                                        <a href="#" class="navi-link" data-toggle="status-change" data-status="4">
                                            <span class="navi-text"><span class="label label-light-info label-inline font-weight-bold">On Hold</span></span>
                                        </a>
                                        </li>
                                        </ul>
                                </div>
                            </div>
                                <button class="btn btn-light-success font-weight-bolder btn-sm mr-2" id="kt_subheader_group_actions_fetch" data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">
                                Fetch Selected
                                </button>
                                <button class="btn btn-light-danger font-weight-bolder btn-sm mr-2" id="kt_subheader_group_actions_delete_all">
                                Delete All
                                </button>
                    </div>
                </div>
        </div>

            <div class="d-flex align-items-center">

                <a href="/metronic/preview/demo5/.html" class="">

                </a>
                <a href="{{ asset('bingo/create/paso-1') }}" class="btn btn-light-primary font-weight-bold ml-2">
                Crear nuevo Bingo
                </a>

                {{-- <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:/metronic/themes/metronic/theme/html/demo5/dist/assets/media/svg/icons/Files/File-plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000"></path>
                    </g>
                    </svg><!--end::Svg Icon--></span>                    </a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right" style="">

                            <ul class="navi">
                            <li class="navi-header font-weight-bold py-5">
                            <span class="font-size-lg">Add New:</span>
                            <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                            </li>
                            <li class="navi-separator mb-3 opacity-70"></li>
                            <li class="navi-item">
                            <a href="#" class="navi-link">
                            <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                            <span class="navi-text">Order</span>
                            </a>
                            </li>
                            <li class="navi-item">
                            <a href="#" class="navi-link">
                            <span class="navi-icon"><i class="navi-icon flaticon2-calendar-8"></i></span>
                            <span class="navi-text">Members</span>
                            <span class="navi-label">
                            <span class="label label-light-danger label-rounded font-weight-bold">3</span>
                            </span>
                            </a>
                            </li>
                            <li class="navi-item">
                            <a href="#" class="navi-link">
                            <span class="navi-icon"><i class="navi-icon flaticon2-telegram-logo"></i></span>
                            <span class="navi-text">Project</span>
                            </a>
                            </li>
                            <li class="navi-item">
                            <a href="#" class="navi-link">
                            <span class="navi-icon"><i class="navi-icon flaticon2-new-email"></i></span>
                            <span class="navi-text">Record</span>
                            <span class="navi-label">
                            <span class="label label-light-success label-rounded font-weight-bold">5</span>
                            </span>
                            </a>
                            </li>
                            <li class="navi-separator mt-3 opacity-70"></li>
                            <li class="navi-footer pt-5 pb-4">
                            <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
                            <a class="btn btn-clean font-weight-bold btn-sm d-none" href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more...">Learn more</a>
                            </li>
                            </ul>

                </div> --}}
            </div>

    </div>

    </div>
</div>

    <div class="d-flex flex-column-fluid">

        <div class=" container ">


            <div class="row">
                @foreach($bingo as $b)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-custom gutter-b card-stretch">
                        <div class="card-body pt-4 d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center mb-7">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                    <div class="symbol symbol-lg-75">
                                        <img alt="Pic" src="assets/media/users/300_1.jpg">
                                    </div>
                                    <div class="symbol symbol-lg-75 symbol-primary d-none">
                                        <span class="font-size-h3 font-weight-boldest">JM</span>
                                    </div>
                                </div>
                                <!--end::Pic-->
                                <!--begin::Title-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $b->nombre }}</a>
                                    <span class="text-muted font-weight-bold">{{ $b->user->name }} </span>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::User-->
                            <!--begin::Desc-->
                            <h3><a href="https://bingo.wdgr.cl/bingo/{{$b->codigo}}" onclick="copyCodeBingo" id="copyCOdeBingo" class="text-primary pr-1">#{{ $b->codigo }}  <i class="fas fa-share-alt"></i></a></h3>

                            <p class="mb-7">{{ $b->descripcion }}</p>
                            <!--end::Desc-->
                            <!--begin::Info-->
                            <div class="mb-7">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                                    <a href="#" class="text-muted text-hover-primary">{{ $b->user->email }}</a>
                                </div>
                                <!--<div class="d-flex justify-content-between align-items-cente my-1">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Teléfono:</span>
                                    <a href="#" class="text-muted text-hover-primary">+56912345678</a>
                                </div>-->
                                <!--<div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
                                    <span class="text-muted font-weight-bold">Barcelona</span>
                                </div>-->
                                <br>
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h2 mb-0">$ {{ $b->precio }} CL</a>

                            </div>
                            <!--end::Info-->
                            <div class="mt-2">

                            {{-- <a href="{{asset('private/bingo/jugar/me/RTDGE')}}" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">Acceder</a> --}}
                            <a href=" {{asset('private/bingo/detalle/'.$b->codigo)}}" class="btn btn-sm btn-warning font-weight-bold py-2 px-3 px-xxl-5 my-1">Administrar</a>
                            <a href="{{asset('private/bingo/jugar/cantor/'.$b->codigo)}}" class="btn btn-sm btn-primary font-weight-bold py-2 px-3 px-xxl-5 my-1">Cantar</a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>


<!--end::Col-->


<!--end::Row-->
<!--begin::Pagination-->
<div class="card card-custom">
<div class="card-body">
<!--begin::Pagination-->
<div class="d-flex justify-content-between align-items-center flex-wrap">
<div class="d-flex flex-wrap mr-3">
    {{ $bingo->links() }}
</div>
</div>
<!--end:: Pagination-->
</div>
</div>
<!--end::Pagination-->
</div>
<!--end::Container-->
</div>
<!--end::Entry-->
</div>

@endsection
