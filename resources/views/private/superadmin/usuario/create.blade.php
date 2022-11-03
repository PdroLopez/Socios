<button class="btn btn-primary btn-icon-sm" data-target="#create" data-toggle="modal" type="button">
    <i class="flaticon2-plus"></i>
    Nuevo usuario
</button>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="create" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!!Form::open(['route' => 'mantenedor-usuarios.store', 'method' => 'POST','files'=>true])!!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Nuevo usuario
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombre</label>
                    {!!Form::text('name',null,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Rut</label>
                    {!!Form::text('rut',null,['class'=>"form-control", 'placeholder'=>"Ingrese un rut..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Direccion</label>
                    {!!Form::text('direccion',null,['class'=>"form-control", 'placeholder'=>"Ingrese una direccion..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">telefono</label>
                    {!!Form::number('telefono',null,['class'=>"form-control", 'placeholder'=>"Ingrese un telefono..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">fecha de nacimiento</label>
                    {!!Form::date('fecha_nacimiento',null,['class'=>"form-control", 'placeholder'=>"Ingrese un telefono..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    {!!Form::email('email',null,['class'=>"form-control", 'placeholder'=>"Ingrese texto..."])!!}
                </div>
                <div class="form-group">
                    <label for="">Rol</label>
                    {!!Form::select('rol_id',$roles,null,['class'=>"form-control", 'placeholder'=>"Seleccionar"])!!}
                </div>
                <div class="form-group">
                    <label class="form-control-label">Contraseña</label>
                    <input name="password" class="form-control" placeholder="" type="password" required="">
                </div>

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
