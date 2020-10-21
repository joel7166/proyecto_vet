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
                <h3>Usuarios</h3>
                <table id="tabla-usuario" class="table table-hover">
                    <thead>
                        <td>DNI</td>
                        <td>NombreS</td>
                        <td>Apellidos</td>
                        <td>Celular</td>
                        <td>Estado</td>
                        <td>ACCIONES</td>
                    </thead>
                </table>

                </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h3> Nuevo Usuario</h3>
              <form id="registro-usuario">
                @csrf
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="seleperfil">Perfil</label>
                      <select class="form-control" id="seleperfil" name="seleperfil">
                        <option value="1">Asistente</option>
                        <option value="2">Cajero</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="txtdni">DNI</label>
                      <input type="text" class="form-control" id="txtdni" name="txtdni" placeholder="DNI" require>
                  </div>


                  <div class="form-group">
                      <label for="inputAddress2">correo</label>
                      <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="Ingrese su correo" require>
                  </div>

                  <div class="form-group">
                      <label for="txtcontraseña">Contraseña</label>
                      <input type="password" class="form-control" id="txtcontraseña" name="txtcontraseña" placeholder="contraseña">
                  </div>
                  <div class="form-group">
                      <label for="txtnombres">Nombres</label>
                      <input type="text" class="form-control" id="txtnombres" name="txtnombres" placeholder="Nombres">
                  </div>
                  <div class="form-group">
                      <label for="txtapellidos">Apellidos</label>
                      <input type="text" class="form-control" id="txtapellidos" name="txtapellidos" placeholder="Apellidos">
                  </div>
                  <div class="form-group">
                      <label for="txtapellidos">Celular</label>
                      <input type="text" class="form-control" id="txtcelular" name="txtcelular" placeholder="Celular">
                  </div>
                  <div class="form-group">
                    <label for="">Estado</label>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="rbgeneromacho" name="rbgenero" value="macho">
                      <label >Masculino</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="rbgenerohembra" name="rbgenero" value="hembra" >
                      <label >Femennino</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" >Registrar</button>
                </div>

              </form>
            </div>

          </div>
          <!------------------editar model-------------------------->
          <div class="modal fade" id="usuario_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Editar Categoria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="usuario_editar">
                <div class="modal-body">
                       @csrf

                       <div class="col-md-6">

                        <input type="hidden" id="txtId2" name="txtId2">
                        <div class="form-group">
                            <label for="seleperfil">Perfil</label>
                            <select class="form-control" id="seleperfil2" name="seleperfil">

                              <option value="1">Asistente</option>
                              <option value="2">Cajero</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtdni">DNI</label>
                            <input type="text" class="form-control" id="txtdni2" name="txtdni" placeholder="DNI" require>
                        </div>


                        <div class="form-group">
                            <label for="inputAddress2">correo</label>
                            <input type="email" class="form-control" id="txtemail2" name="txtemail" placeholder="Ingrese su correo" require>
                        </div>

                        <div class="form-group">
                            <label for="txtcontraseña">Contraseña</label>
                            <input type="password" class="form-control" id="txtcontraseña2" name="txtcontraseña" placeholder="contraseña">
                        </div>
                        <div class="form-group">
                            <label for="txtnombres">Nombres</label>
                            <input type="text" class="form-control" id="txtnombres2" name="txtnombres" placeholder="Nombres">
                        </div>
                        <div class="form-group">
                            <label for="txtapellidos">Apellidos</label>
                            <input type="text" class="form-control" id="txtapellidos2" name="txtapellidos" placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                            <label for="txtapellidos">Celular</label>
                            <input type="text" class="form-control" id="txtcelular2" name="txtcelular" placeholder="Celular">
                        </div>
                        <div class="form-group">
                          <label for="">Estado</label>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="rbgeneromacho" name="rbgenero2" value="1">
                            <label >Masculino</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="rbgenerohembra" name="rbgenero2" value="0" >
                            <label >Femennino</label>
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

          <!---------------------eliminar----------------------------------->

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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-primary">Eliminar</button>
          </div>
        </div>
      </div>
  </div>
</div>
<script>
            $(document).ready(function(){
                var tablaanimal=$('#tabla-usuario').DataTable({
                    processing:true,
                    serverSide:true,
                    ajax:{
                        url:"{{route('usuario.index')}}",
                    },
                    columns:[
                        {data:'usu_dni'},
                        {data:'usu_nombres'},
                        {data:'usu_apellidos'},
                        {data:'usu_celular'},
                        {data:'usu_estado'},

                        {data:'action',orderable:false}
                    ]
                });
            });
        </script>

          <!-- Eliminar-->
<script>
  var usu_id;
  $(document).on('click','.delete',function(){
      usu_id=$(this).attr('id');

      $('#confimodal').modal('show');

  });
  $('#btnEliminar').click(function(){
      $.ajax({
          url:"usuario/eliminar/"+usu_id,
          beforeSend:function(){
              $('#btnEliminar').text('Eliminando....');
          },
          success:function(data){
              setTimeout(function(){
                  $('#confimodal').modal('hide');
                  toastr.warning('El registro fue eliminado correctamente.','Eliminar Registro',{timeout:30});
                  $('#tabla-usuario').DataTable().ajax.reload();

              },2000);
              $('#btnEliminar').text('Eliminar');
          }

      });

  });
</script>
<!-------------------registar nueva categoria------------------------->
<script>
    $('#registro-usuario').submit(function(e){
        e.preventDefault();
        var perfil=$('#seleperfil').val();
        var dni=$('#txtdni').val();
        var correo=$('#txtnombres').val();
        var contrasenia=$('#txtcontraseña').val();
        var nombre=$('#txtnombres').val();
        var apellido=$('#txtapellidos').val();
        var celular=$('#txtcelular').val();
        var estado=$("input[name='rbgenero']:checked").val();
        var _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{route('usuario.registrar')}}",
            type:"POST",
            data:{
                per_id:perfil,
                usu_dni:dni,
                usu_email:correo,
                usu_contrasenia:contrasenia,
                usu_nombres:nombre,
                usu_apellidos:apellido,
                usu_celular:celular,
                usu_estado:estado,
              _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-usuario')[0].reset();
                    toastr.success('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-usuario').DataTable().ajax.reload();

                }
            }

        });

    });
</script>
<!-------------editar------------------->
<script>
    function editaranimal(id){
        $.get('../usuario.editar/'+id,function(usuario){
            //asignar los datos recuperados
            $('#txtId2').val(usuario[0].usu_id);
            $('#seleperfil2').val(usuario[0].per_id);
            $('#txtdni2').val(usuario[0].usu_dni);
            $('#txtemail2').val(usuario[0].usu_email);
            $('#txtcontraseña2').val(usuario[0].usu_contrasenia);
            $('#txtnombres2').val(usuario[0].usu_nombres);
            $('#txtapellidos2').val(usuario[0].usu_apellidos);
            $('#txtcelular2').val(usuario[0].usu_celular);
            if(usuario[0].usu_estado=="1"){
                     $('input[name=rbgenero2][value="macho"]').prop('checked',true);
                 }
                 if(usuario[0].usu_estado=="0"){
                     $('input[name=rbgenero2][value="hembra"]').prop('checked',true);
                 }
            $("input[name=_token]").val();

            $('#usuario_edit_modal').modal('toggle');

        });

    }

</script>

@endsection
