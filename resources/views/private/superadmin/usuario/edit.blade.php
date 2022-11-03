
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$usuarios->id}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-usuarios.update',$usuarios->id],'files'=>true, 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar usuario
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombre</label>
                    {!!Form::text('name',$usuarios->name,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Rut</label>
                    {!!Form::text('rut',$usuarios->rut,['class'=>"form-control", 'placeholder'=>"Ingrese un rut..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Direccion</label>
                    {!!Form::text('direccion',$usuarios->direccion,['class'=>"form-control", 'placeholder'=>"Ingrese una direccion..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">telefono</label>
                    {!!Form::number('telefono',$usuarios->telefono,['class'=>"form-control", 'placeholder'=>"Ingrese un telefono..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">fecha de nacimiento</label>
                    {!!Form::date('fecha_nacimiento',$usuarios->fecha_nacimiento,['class'=>"form-control", 'placeholder'=>"Ingrese un telefono..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    {!!Form::email('email',$usuarios->email,['class'=>"form-control", 'placeholder'=>"Ingrese un correo..."])!!}
                </div>
                <div class="form-group">
                    <label for="">Rol</label>
                    {!!Form::select('rol_id',$roles,$usuarios->rol->id,['class'=>"form-control", 'placeholder'=>"Seleccionar"])!!}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-primary">
                    Actualizar
                </button>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
