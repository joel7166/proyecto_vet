@extends('master')

@section('content')

<!----todo codigo html------>
<div class="container">
   <br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuarios</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                <h3>Propietarios</h3>
                <table id="tabla-propietario" class="table table-hover">
                    <thead>
                        <td>DNI</td>
                        <td>Nombre</td> 
                        <td>Apellidos</td>
                        <td>Telefono</td>
                        <td>Correo</td>
                        <td>Direccion</td>
                        <td>ACCIONES</td>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            
                            <h3> Nuevo Propietario</h3>
                            <div class="ln_solid"></div>
                            <form id="registro-propietario"data-parsley-validate class="form-horizontal form-label-left">
                                    @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdni">DNI<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="txtdni" name="txtdni" required>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtnombres">Nombres<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="txtnombre" name="txtnombre"  required>
                                    </div>
                                    
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtapellidos">Apellidos<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="txtapellidos" name="txtapellidos"  required>
                                   </div>
                                    
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtapellidos">Celular</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="txtcelular" name="txtcelular" >
                                    </div>
                                    
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputAddress2">correo<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="email" class="form-control" id="txtemail" name="txtemail" required>
                                   </div>
                                    
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputAddress2">Direccion</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" >
                                     </div>
                                    
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputAddress2">Ciudad</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="txtciudad" name="txtciudad" >
                                    </div>
                                    
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group" >
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success" >Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
          </div>
<!--modal eliminar-->
  <div class="modal fade" id="confimodal"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Confirmacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Desea eliminar el registro seleccionado?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-primary">Eliminar</button>
          </div>
        </div>
      </div>
  </div>
  <!--modal editar-->
  <div class="modal fade" id="propietario_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="propietario_editar_form">
                <div class="modal-body">
                  @csrf
                  <input type="hidden" id="txtId2" name="txtId2">
                    <div class="form-group">
                        <label for="txtdni">DNI</label>
                        <input type="text" class="form-control" id="txtdni2" name="txtdni2" disabled>
                    </div>
                    <div class="form-group">
                        <label for="txtnombres">Nombres</label>
                        <input type="text" class="form-control" id="txtnombre2" name="txtnombre2">
                    </div>
                    <div class="form-group">
                        <label for="txtapellidos">Apellidos</label>
                        <input type="text" class="form-control" id="txtapellidos2" name="txtapellidos2" >
                    </div>
                    <div class="form-group">
                        <label for="txtapellidos">Celular</label>
                        <input type="text" class="form-control" id="txtcelular2" name="txtcelular2">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">correo</label>
                        <input type="email" class="form-control" id="txtcorreo2" name="txtcorreo2" >
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Direccion</label>
                        <input type="text" class="form-control" id="txtdireccion2" name="txtdireccion2">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Ciudad</label>
                        <input type="text" class="form-control" id="txtciudad2" name="txtciudad2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
      </div>
   </div>
</div>
<!--registro-->
<script>
    $('#registro-propietario').submit(function(e){
        e.preventDefault();
        var dni=$('#txtdni').val();
        var nombre=$('#txtnombre').val();
        var apellidos=$('#txtapellidos').val();
        var telefono=$('#txtcelular').val();
        var email=$('#txtemail').val();
        var direccion=$('#txtdireccion').val();
        var ciudad=$('#txtciudad').val();
        var _token=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('propietario.registrar')}}",
            type:"POST",
            data:{
                pro_dni:dni,
                pro_nombre:nombre,
                pro_apellidos:apellidos,
                pro_telefono:telefono,
                pro_email:email,
                pro_direccion:direccion,
                pro_ciudad:ciudad,
                _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-propietario')[0].reset();
                    //$('#propietario_edit_modal').modal('hide');
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro Insertado Correctamente',
                    showConfirmButton: false,
                    timer: 3000
                    });
                   //toastr.succes('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-propietario').DataTable().ajax.reload();
                }
            }

        });
    });
</script>
<!--listar-->
<script>
    $(document).ready(function(){
        var tablaanimal=$('#tabla-propietario').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:"{{route('propietario.index')}}",
            },
            columns:[
                {data:'pro_dni'},
                {data:'pro_nombre'},
                {data:'pro_apellidos'},
                {data:'pro_telefono'},
                {data:'pro_email'},
                {data:'pro_direccion'},

                {data:'action',orderable:false}
            ]
        });
    });
</script>
<!--eliminar-->
<script>
            var pro_id;
            $(document).on('click','.delete',function(){
                pro_id=$(this).attr('id');

                $('#confimodal').modal('show');


            });
            $('#btnEliminar').click(function(){
                $.ajax({
                    url:"../propietario/eliminar/"+pro_id,
                    beforeSend:function(){
                        $('#btnEliminar').text('Eliminando....');
                    },
                    success:function(data){
                        setTimeout(function(){
                            $('#confimodal').modal('hide');
                            toastr.warning('El registro fue eliminado correctamente.','Eliminar Registro',{timeout:30});
                            $('#tabla-propietario').DataTable().ajax.reload();

                        },2000);
                        $('#btnEliminar').text('Eliminar');
                    }

                });

            });
</script>
<!--editar-->
<script>
    function editarpropietario(id){
        $.get('../propietario/editar/'+id,function(propietario){
            //asignar los datos recuperados

            $('#txtId2').val(propietario[0].pro_id);
            $('#txtdni2').val(propietario[0].pro_dni);
            $('#txtnombre2').val(propietario[0].pro_nombre);
            $('#txtapellidos2').val(propietario[0].pro_apellidos);
            $('#txtcelular2').val(propietario[0].pro_telefono);
            $('#txtcorreo2').val(propietario[0].pro_email);
            $('#txtdireccion2').val(propietario[0].pro_direccion);
            $('#txtciudad2').val(propietario[0].pro_ciudad);
            $("input[name=_token]").val();


            $('#propietario_edit_modal').modal('toggle');

        });

    }
</script>
<!--actualizar-->
<script>
    $('#propietario_editar_form').submit(function(e){
        e.preventDefault();
        var id2=$('#txtId2').val();
        var nombre2=$('#txtnombre2').val();
        var apellidos2=$('#txtapellidos2').val();
        var celular2=$('#txtcelular2').val();
        var correo2=$('#txtcorreo2').val();
        var direccion2=$('#txtdireccion2').val();
        var ciudad2=$('#txtciudad2').val();
        var _token2=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('propietario.actualizar')}}",
            type:"POST",
            data:{
                id:id2,
                nombre:nombre2,
                apellidos:apellidos2,
                telefono:celular2,
                correo:correo2,
                direccion:direccion2,
                ciudad:ciudad2,
                _token:_token2
            },
            success:function(response){
                if(response){
                    $('#propietario_edit_modal').modal('hide');
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro Actualizado Correctamente',
                    showConfirmButton: false,
                    timer: 3000
                    });
                    //toastr.info('El registro fue actualizado correctamente.','Actualizar Registro',{timeout:3000});
                    $('#tabla-propietario').DataTable().ajax.reload();

                }
            }
        })


    });
</script>
@endsection
