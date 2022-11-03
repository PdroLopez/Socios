<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="edit{{$empresas->id}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-empresa.update',$empresas->id],'files'=>true, 'method' => 'PUT']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Empresa
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombre</label>
                    {!!Form::text('nombre',$empresas->nombre,['class'=>"form-control", 'placeholder'=>"Ingrese un nombre..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">rut</label>
                    {!!Form::text('rut',$empresas->rut,['class'=>"form-control", 'placeholder'=>"Ingrese un Rut..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Direccion</label>
                    {!!Form::text('direccion',$empresas->direccion,['class'=>"form-control", 'placeholder'=>"Ingrese una Direccion..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Correo Electronico</label>
                    {!!Form::email('email',$empresas->email,['class'=>"form-control", 'placeholder'=>"Ingrese un correo..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Telefono</label>
                    {!!Form::number('telefono',$empresas->telefono,['class'=>"form-control", 'placeholder'=>"Ingrese un correo..." , 'required'])!!}
                </div>
                <div class="form-group">
                    <label for="">Fecha de nacimiento</label>
                    {!!Form::date('f_nacimiento',$empresas->f_nacimiento,['class'=>"form-control", 'placeholder'=>"Ingrese un correo..." , 'required'])!!}
                </div>
{{--
                <div class="form-group">
                    <label class="form-control-label">
                        Clase
                    </label>
                    {!!Form::text('class',$estado->class,['class'=>"form-control", 'placeholder'=>"Ingrese texto" , 'required'])!!}
                </div> --}}
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
