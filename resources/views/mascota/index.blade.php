@extends('master')


@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
                <div class="x_title">
                    <h2>Propietario <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <input type="text" class="form-control" name="txtdni" id="txtdni">

                        </li>

                       <li><button class="btn btn-success" name="buscar" id="buscar" href="javascript::void(0)" onclick="buscarpropietario()" ><i class="buscar fa fa-search"></i>&nbsp;Buscar</button>

                        </li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <div class="row">
                      <input type="hidden" id="txtId2" name="txtId2">
                      <div class="col-md-4 col-sm-12  form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdni">DNI</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" id="txtdni2" name="txtdni2" disabled>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdni">Nombre</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control" id="txtnombre2" name="txtnombre2" disabled>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdni">Apellidos</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" id="txtapellidos2" name="txtapellidos2" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdni">Telefono</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" id="txtcelular2" name="txtcelular2" disabled>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdni"  >Email</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" id="txtcorreo2" name="txtcorreo2" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdni">Direccion</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" id="txtdireccion2" name="txtdireccion2" disabled>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-12  form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdni">Ciudad</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" class="form-control" id="txtciudad2" name="txtciudad2" disabled>
                            </div>

                        </div>
                    </div>

               </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
                <div class="x_title">
                    <h2>lista de Mascotas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalnuevo"><i class="fa fa-plus-circle"></i>&nbsp;Nuevo</button>
                        </li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <table id="tabla-animal" class="table table-hover">
                        <thead>

                            <td>Nombre</td>
                            <td>Especie</td>
                            <td>Raza</td>
                            <td>Color</td>
                            <td>Edad</td>
                            <td>Genero</td>
                            <td>Propietario</td>
                            <td>Acciones</td>
                        </thead>
                    </table>
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
<!--modal nuevo-->

<div class="modal fade" id="modalnuevo"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form  id="registro-mascota">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">nueva Mascota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <label for="txtpropietario">Dni Propietario</label>
                            <input type="text" class="form-control" id="txtpropietario" placeholder="" name="txtpropietario">
                        </div>

                        <div class="form-group">
                            <label for="txtnombre">Nombre Animal</label>
                            <input type="text" class="form-control" id="txtnombre" placeholder="" name="txtnombre">
                        </div>

                        <div class="form-group">
                            <label>Especie</label>
                            <select class="form-control select2" style="width: 100%;" name="txtespecie" id="txtespecie">
                                <option selected="selected">Seleccionar Especie</option>
                                <option>perro</option>
                                <option>gato</option>
                                <option>conejo</option>
                                <option>ave</option>
                                <option>reptil</option>
                                <option>roedor</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="txtraza">Raza</label>
                            <input type="text" class="form-control" id="txtraza" placeholder="" name="txtraza">
                        </div>



                        <div class="form-group">
                            <label for="txtcolor">Color</label>
                            <input type="text" class="form-control" id="txtcolor" placeholder="" name="txtcolor">
                        </div>


                        <div class="form-group">
                            <label for="">GENERO</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="rbgenero" value="Macho">
                                <label for="customRadio1" class="custom-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Macho</font></font></label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="rbgenero" value="Hembra">
                                <label for="customRadio2" class="custom-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hembra</font></font></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNombre">Fecha Nacimiento</label>
                            <input type="date" name="txtfecha" id="txtfecha" class="date-picker form-control">
                           
                        </div>

                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnnuevo" name="btnnuevo" class="btn btn-primary">Guardar</button>
                </div>
            </div>

        </form>

      </div>
</div>

<!--modal editar-->

<div class="modal fade" id="modaleditar"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form  id="editar-mascota">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Mascota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <input type="hidden" id="txtId2" name="txtId2">
                        <input type="hidden" id="txtpropietario3" name="txtpropietario3">
                        <div class="form-group">
                            <label for="txtpropietario"> Propietario</label>
                            <input type="text" class="form-control" id="txtnombrep" placeholder="" name="txtnombrep" disabled>
                        </div>

                        <div class="form-group">
                            <label for="txtnombre">Nombre Animal</label>
                            <input type="text" class="form-control" id="txtnombre3" placeholder="" name="txtnombre3">
                        </div>

                        <div class="form-group">
                            <label>Especie</label>
                            <select class="form-control select2" style="width: 100%;" name="txtespecie2" id="txtespecie2">
                                <option selected="selected">Seleccionar Especie</option>
                                <option>perro</option>
                                <option>gato</option>
                                <option>conejo</option>
                                <option>ave</option>
                                <option>reptil</option>
                                <option>roedor</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="txtraza">Raza</label>
                            <input type="text" class="form-control" id="txtraza2" placeholder="" name="txtraza2">
                        </div>



                        <div class="form-group">
                            <label for="txtcolor">Color</label>
                            <input type="text" class="form-control" id="txtcolor2" placeholder="" name="txtcolor2">
                        </div>


                        <div class="form-group">
                            <label for="">Genero</label>
                            <div class="custom-control custom-radio">

                                <input type="radio" id="rbgeneromacho2" name="rbgenero2" value="Macho">
                                <label for="rbgeneromacho2">Macho</label>
                                </div>
                                <div class="custom-control custom-radio">
                                <input type="radio" id="rbgenerohembra2" name="rbgenero2" value="Hembra" >
                                <label for="rbgenerohembra2">Hembra</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNombre">Fecha Nacimiento</label>
                            <input type="datetime" name="txtfecha3" id="txtfecha3" class="date-picker form-control">
                           <!-- <input id="birthday" class="date-picker form-control" id="txtfecha" name="txtfecha" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'"
                            onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function() {
                                        input.type = 'text';
                                    }, 60000);
                                }
                            </script>-->
                        </div>

                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnactualizar" name="btnactualizar" class="btn btn-primary">Actualizar</button>
                </div>
            </div>

        </form>

      </div>
</div>

<script>
    /* function lista(id){
            var tablaanimal=$('#tabla-animal').DataTable({
                processing:true,
                serverSide:true,

                ajax:{
                    url:'../mascota/lista/'+id,
                },
                columns:[
                    {data:'ani_nombre'},
                    {data:'ani_especie'},
                    {data:'ani_raza'},
                    {data:'ani_color'},
                    {data:'edad'},
                    {data:'ani_genero'},
                    {data:'action',orderable:false}
                ]
            });
    }*/
    /*lista de animales*/
    $(document).ready(function(){
        var tablaanimal=$('#tabla-animal').DataTable({
                processing:true,
                serverSide:true,

                ajax:{
                    url:"{{route('mascota.index')}}",
                },
                columns:[
                    {data:'ani_nombre'},
                    {data:'ani_especie'},
                    {data:'ani_raza'},
                    {data:'ani_color'},
                    {data:'edad'},
                    {data:'ani_genero'},
                    {data:'pro_nombre'},
                    {data:'action',orderable:false}
                ]
            });
    });

//buscar propietario
    function buscarpropietario(){
         var dni;
        dni=$('#txtdni').val();

        $.get('../mascota/buscar/'+dni,function(propietario){
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
        //var id=$('#txtId2').val();
        //lista(id);
        });
    }


    /*ELIMINAR MASCOTA*/
    var ani_id;
    $(document).on('click','.delete',function(){
        ani_id=$(this).attr('id');

        $('#confimodal').modal('show');


    });
    $('#btnEliminar').click(function(){
        $.ajax({
            url:"../mascota/eliminar/"+ani_id,
            beforeSend:function(){
                $('#btnEliminar').text('Eliminando....');
            },
            success:function(data){
                setTimeout(function(){
                    $('#confimodal').modal('hide');
                    toastr.warning('El registro fue eliminado correctamente.','Eliminar Registro',{timeout:30});
                    $('#tabla-animal').DataTable().ajax.reload();

                },2000);
                $('#btnEliminar').text('Eliminar');
            }

        });

    });

    /*nuevo*/

    $('#registro-mascota').submit(function(e){
        e.preventDefault();
        var dni=$('#txtpropietario').val();
        var nombre=$('#txtnombre').val();
        var especie=$('#txtespecie').val();
        var raza=$('#txtraza').val();
        var color=$('#txtcolor').val();
        var genero=$("input[name='rbgenero']:checked").val();
        var fecha=$('#txtfecha').val();
        var _token=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('mascota.registrar')}}",
            type:"POST",
            data:{
                ani_dni:dni,
                ani_nombre:nombre,
                ani_especie:especie,
                ani_raza:raza,
                ani_color:color,
                ani_fecha:fecha,
                ani_genero:genero,
                _token:_token
            },
            success:function(response){
                if(response){
                    $('#modalnuevo').modal('hide');
                   // $('#registro-animal')[0].reset();
                    toastr.success('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-animal').DataTable().ajax.reload();
                }
            }

        });
    });

/*EDITAR MASCOTA*/

    function editarmascota(id){
        $.get('../mascota/editar/'+id,function(mascotas){
            //asignar los datos recuperados
            $('#txtId2').val(mascotas[0].ani_id);
            $('#txtpropietario3').val(mascotas[0].pro_id);
            $('#txtnombrep').val(mascotas[0].pro_nombre);
            $('#txtnombre3').val(mascotas[0].ani_nombre);
            $('#txtespecie2').val(mascotas[0].ani_especie);
            $('#txtraza2').val(mascotas[0].ani_raza);
            $('#txtcolor2').val(mascotas[0].ani_color);
            if(mascotas[0].ani_genero == "Macho"){
                      $('input[name=rbgenero2][value="Macho"]').prop('checked',true);
                  }
            if(mascotas[0].ani_genero=="Hembra"){
                $('input[name=rbgenero2][value="Hembra"]').prop('checked',true);
            }
            $('#txtfecha3').val(mascotas[0].ani_fecha_nacimiento);

            $("input[name=_token]").val();

            $('#modaleditar').modal('toggle');

        });

    }
// ACTUALIZAR******************

$('#editar-mascota').submit(function(e){
        e.preventDefault();
        var id3=$('#txtId2').val();

        var anombre3=$('#txtnombre3').val();
        var especie2=$('#txtespecie2').val();
        var raza2=$('#txtraza2').val();
        var color2=$('#txtcolor2').val();
        var fecha2=$('#txtfecha3').val();
        var genero2=$("input[name='rbgenero2']:checked").val();
        var _token2=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('mascota.actualizar')}}",
            type:"POST",
            data:{
                ani_id:id3,
                ani_nombre:anombre3,
                ani_especie:especie2,
                ani_raza:raza2,
                ani_color:color2,
                ani_fecha:fecha2,
                ani_genero:genero2,
                _token:_token2
            },
            success:function(response){
                if(response){
                    $('#modaleditar').modal('hide');
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro Actualizado Correctamente',
                    showConfirmButton: false,
                    timer: 3000
                    });
                    //toastr.info('El registro fue actualizado correctamente.','Actualizar Registro',{timeout:3000});
                    $('#tabla-animal').DataTable().ajax.reload();

                }
            }
        })

    });

</script>
@endsection
