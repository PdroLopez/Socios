<button class="btn btn-primary btn-icon-sm" data-target="#create" data-toggle="modal" type="button">
    <i class="flaticon2-plus"></i>
    Nueva Empresa
</button>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!!Form::open(['route' => 'mantenedor-empresa.store', 'method' => 'POST','files'=>true])!!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nueva Empresa
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombre</label>
                    {!!Form::text('nombre',null,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">rut</label>
                    {!!Form::text('rut',null,['class'=>"form-control", 'placeholder'=>"Ingrese un Rut..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Direccion</label>
                    {!!Form::text('direccion',null,['class'=>"form-control", 'placeholder'=>"Ingrese una Direccion..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Correo Electronico</label>
                    {!!Form::email('email',null,['class'=>"form-control", 'placeholder'=>"Ingrese un correo..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Telefono</label>
                    {!!Form::number('telefono',null,['class'=>"form-control", 'placeholder'=>"Ingrese un correo..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Fecha de nacimiento</label>
                    {!!Form::date('f_nacimiento',null,['class'=>"form-control", 'placeholder'=>"Ingrese un correo..." , 'required'])!!}
                </div>
{{--                 <div class="form-group">
                    <label for="">Clase</label>
                    {!!Form::text('class',null,['class'=>"form-control", 'placeholder'=>"Ingrese texto..."])!!}
                </div> --}}
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-primary">
                    Registrar
                </button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
