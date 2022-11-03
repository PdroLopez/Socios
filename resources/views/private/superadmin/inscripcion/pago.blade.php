<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="agregarpagomodal{{$inscripciones->id}}" role="dialog" tabindex="-1">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Creación de pago </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {!! Form::open(['route' => ['mantenedor-inscripcion-pago',$inscripciones->id], 'method' => 'POST']) !!}
            <input id="estado_id" name="estado_id" type="hidden" value="8">
            <input id="tiposolicitud" name="prodId" type="hidden" value="inscripcion">
            <div class="form-group">
                <label for="exampleInputEmail1">Codigo solicitud</label>
                <input type="text" class="form-control" name="inscripciones_id"  value="{{$inscripciones->id}}" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Solicitante</label>
              <input type="text" name="nombre_solicitante" class="form-control" id="exampleInputEmail1"  value="{{$inscripciones->name}}" readonly>
              </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Monto del pago</label>
                <input type="text"  name="monto"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Concepto del pago</label>
                <input type="text"   name="nombre"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">mensualidad, pack, cuota de inscripción etc</small>

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Descripción del pago</label>
                <input type="text"  name="descripcion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">especificar el detalle de la composicion del pago.</small>
              </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comentarios adicional para el usuario</label>
                <textarea class="form-control" name="comentario" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                Cerrar
            </button>
            <button class="btn btn-primary">
                Ingresar
            </button>
        </div>
        {!!Form::close()!!}
        </div>
      </div>

</div>

