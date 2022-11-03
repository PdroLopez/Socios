@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h5 class="card-label">Revisión estado de solicitud de ingreso para socio o socia.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             </h5>
            </div>
        </div>
    <form method="POST" action=" {{asset('consulta/suscripcion')}}" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="bShEpO9YG69UPhcoZrDrx3MJTe3tq7vrvehLNvaD">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Rut*</label>
                            <input class="form-control" placeholder="Ingrese su rut... 15991088-1"  name="rut" type="text">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Fecha de Nacimiento*</label>
                            <input class="form-control" placeholder="Ingrese su fecha de nacimiento..."  name="fnacimiento" type="date">
                        </div>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Telefono*</label>
                            <input class="form-control" placeholder="Ingrese su telefono..."  name="telefono" type="number">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <br>
                            <a href="#" onclick="enviarConsultaSuscripcion(1)"  class="btn btn-xs btn-outline btn-warning">Enviar </a>
                        </div>
                    </div>
                </div>

                   
            </div>
            
        </form>
    </div>
</div>
@stop


<script>
    function enviarConsultaSuscripcion(val) {
        
       

        var rut = $("input[name=rut]").val();
        var nacimiento = $("input[name=rut]").val();
        var telefono = $("input[name=rut]").val();
        var url = '{{ asset('validar/telefono') }}';
       

                              
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:url,
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                 rut: rut,
                 nacimiento: nacimiento,
                 telefono: telefono
            },
            success: function( data ){
                // alert(data['name']);
                if (data['validate'] == 1) {                   
                swal({
                    text: 'Datos correctos! Hemos enviado un codigo a tu telefono ingresa los codigos aquí".',
                    content: "input",
                    button: {
                        text: "ingresar!",
                        closeModal: false,
                    },
                    })
                    .then(name => {
                    if (!name) throw null;
                    return fetch("{{ asset('validar/telefono/success/') }}"+"/"+name, {
                                    method: 'GET'
                                });

                    })
.then((response) => response.json())
    .then((responseData) => {
    //   alert(responseData['validate']);
    //   return responseData;

    swal({
                    title: "Codigo Validado",
                    text: "Sus datos son incorrectos" + responseData['validate'],
                    text: "redirigiendo...",
                    icon: "success",
                    buttons: false,
                    timer: 3000
                    
     });
     setTimeout(function(){ window.location.href = "{{asset('validar/inscripcion/')}}" +"/"+responseData['validate'] }, 2000);
        
            
                   
                  
    })

.catch(err => {
  if (err) {
    swal("Oh noes!", "The AJAX request failed!", "error");
  } else {
    swal.stopLoading();
    swal.close();
  }
});

                    
                }else{
                    swal({
                    title: "Lo sentimos!",
                    text: "Sus datos son incorrectos, intenta nuevamente. si tienes problemas de acceso comunicate con correo inscripciones@corporacioneverton.cl",
                    icon: "warning",
                    button: "cerrar",
                    });
                }






                
            },
            error: function (xhr, b, c) {
                console.log("xhr=" + xhr + " b=" + b + " c=" + c);
            }
        });
             }
</script>
<script> 


</script>