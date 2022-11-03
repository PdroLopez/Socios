<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="editar{{$inscripciones->id}}" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			{!! Form::open(['route' => ['mantenedor-inscripcion',$inscripciones->id],'files'=>true, 'method' => 'GET']) !!}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Editar Inscripcion
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                </button>
            </div>
            <div class="moda-body">
                <div class="form-group">
                    <label for="">Estado</label>
                    {!!Form::select('estado_id',$estado,null,['class'=>"form-control", 'placeholder'=>"Seleccionar"])!!}
                </div>
            </div>
<<<<<<< HEAD
=======
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comentarios</label>
                <textarea class="form-control" name="estadodescripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
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
>>>>>>> 572150f7ee5449161874d8eca704513818890dc2

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

