@extends('master')

@section('content')

<!----todo codigo html------>
<div class="container">
   <br>
        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Medicos</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <h3>Medicos</h3>
                <table id="tabla-medico" class="table table-hover">
                    <thead>
                        <td>DNI</td>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Telefono</td>
                        <td>Correo</td>
                        <td>Genero</td>
                        <td>Edad</td>
                        <td>ACCIONES</td>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">

                            <h3> Nuevo Medico</h3>
                            <div class="ln_solid"></div>
                            <form id="registro-medico" data-parsley-validate class="form-horizontal form-label-left">
                                    @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdni">DNI<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="txtdni" name="txtdni" required>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtnombre">Nombres<span class="required">*</span></label>
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtapellidos">Telefono</label>
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
                                
                                <div class="item form-group ">
                                    <label for="" class=" col-form-label col-md-3 col-sm-3 label-align">Genero</label>
                                   <div class="col-md-6 col-sm-6 ">
                                    <div class="custom-control custom-radio ">
                                            <input class="custom-control-input" type="radio" id="customRadio1" name="rbgenero" value="Masculino">
                                            <label for="customRadio1" class="custom-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Masculino</font></font></label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio2" name="rbgenero" value="Femenino">
                                            <label for="customRadio2" class="custom-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Femenino</font></font></label>
                                        </div>
                                   </div>
                                    
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputAddress2">Fecha Nacimiento</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="Date" class="form-control" id="txtfecha" name="txtfecha">
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
  <div class="modal fade" id="medico_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="medico_editar_form">
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
                        <label for="txtapellidos">Telefono</label>
                        <input type="text" class="form-control" id="txtcelular2" name="txtcelular2">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">correo</label>
                        <input type="email" class="form-control" id="txtcorreo2" name="txtcorreo2" >
                    </div>
                    <div class="form-group">
                        <label for="">GENERO</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadioss1" name="rbgenero2" value="Masculino">
                            <label for="customRadio1" class="custom-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Masculino</font></font></label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadioss2" name="rbgenero2" value="Femenino">
                            <label for="customRadio2" class="custom-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Femenino</font></font></label>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label  for="txtfecha">Fecha Nacimiento</label>
                        <div>
                            <input type="Date" class="form-control" id="txtfecha2" name="txtfecha2" >
                        </div>
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
    $('#registro-medico').submit(function(e){
        e.preventDefault();
        var dni=$('#txtdni').val();
        var nombre=$('#txtnombre').val();
        var apellidos=$('#txtapellidos').val();
        var telefono=$('#txtcelular').val();
        var email=$('#txtemail').val();
        var genero=$("input[name='rbgenero']:checked").val();
        var fecha=$('#txtfecha').val();
        var _token=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('medico.registrar')}}",
            type:"POST",
            data:{
                med_dni:dni,
                med_nombre:nombre,
                med_apellidos:apellidos,
                med_telefono:telefono,
                med_email:email,
                med_genero:genero,
                med_fecha:fecha,
                _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-medico')[0].reset();
                    //toastr.info('El registro fue actualizado correctamente.','Actualizar Registro',{timeout:3000});
                    toastr.success('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-medico').DataTable().ajax.reload();
                }
            }

        });
    });
</script>
<!--listar-->
<script>
    $(document).ready(function(){
        var tablaanimal=$('#tabla-medico').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:"{{route('medico.index')}}",
            },
            columns:[
                {data:'med_dni'},
                {data:'med_nombre'},
                {data:'med_apellidos'},
                {data:'med_telefono'},
                {data:'med_email'},
                {data:'med_genero'},
                {data:'edad'},

                {data:'action',orderable:false}
            ]
        });
    });
</script>
<!--eliminar-->
<script>
            var med_id;
            $(document).on('click','.delete',function(){
                med_id=$(this).attr('id');

                $('#confimodal').modal('show');


            });
            $('#btnEliminar').click(function(){
                $.ajax({
                    url:"../medico/eliminar/"+med_id,
                    beforeSend:function(){
                        $('#btnEliminar').text('Eliminando....');
                    },
                    success:function(data){
                        setTimeout(function(){
                            $('#confimodal').modal('hide');
                            toastr.warning('El registro fue eliminado correctamente.','Eliminar Registro',{timeout:30});
                            $('#tabla-medico').DataTable().ajax.reload();

                        },2000);
                        $('#btnEliminar').text('Eliminar');
                    }

                });

            });
</script>
<!--editar-->
<script>
    function editarmedico(id){
        $.get('../medico/editar/'+id,function(medico){
            //asignar los datos recuperados
            $('#txtId2').val(medico[0].med_id);
            $('#txtdni2').val(medico[0].med_dni);
            $('#txtnombre2').val(medico[0].med_nombre);
            $('#txtapellidos2').val(medico[0].med_apellidos);
            $('#txtcelular2').val(medico[0].med_telefono);
            $('#txtcorreo2').val(medico[0].med_email);
            if(medico[0].med_genero == "Masculino"){
                      $('input[name=rbgenero2][value="Masculino"]').prop('checked',true);
                  }
            if(medico[0].ani_genero=="Femenino"){
                $('input[name=rbgenero2][value="Femenino"]').prop('checked',true);
            }
            $('#txtfecha2').val(medico[0].med_fecha_nacimiento);
            $("input[name=_token]").val();

            $('#medico_edit_modal').modal('toggle');

        });

    }
</script>
<!--actualizar-->
<script>
    $('#medico_editar_form').submit(function(e){
        e.preventDefault();
        var id2=$('#txtId2').val();
        var nombre2=$('#txtnombre2').val();
        var apellidos2=$('#txtapellidos2').val();
        var celular2=$('#txtcelular2').val();
        var correo2=$('#txtcorreo2').val();
        var genero2=$("input[name='rbgenero2']:checked").val();
        var fecha2=$('#txtfecha2').val();
        var _token2=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('medico.actualizar')}}",
            type:"POST",
            data:{
                id:id2,
                nombre:nombre2,
                apellidos:apellidos2,
                telefono:celular2,
                correo:correo2,
                genero:genero2,
                fecha:fecha2,
                _token:_token2
            },
            success:function(response){
                if(response){
                    $('#medico_edit_modal').modal('hide');
                    toastr.info('El registro fue actualizado correctamente.','Actualizar Registro',{timeout:3000});
                    $('#tabla-medico').DataTable().ajax.reload();

                }
            }
        })


    });
</script>
@endsection
