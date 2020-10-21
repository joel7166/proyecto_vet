@extends('master')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de Perfil</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo Perfil</a>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>LISTA DE PERFIL</h3>
            <table id="tabla-perfil" class="table table-hover">
                <thead>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>DESCRIPCION</td>
                    <td>ACCIONES</td>
                </thead>
            </table>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <h3>Nuevo Perfil</h3>
            <form id="registro-perfil">
                @csrf
                <div class="form-group">
                    <label for="inputAddress2">Nombre</label>
                    <input type="text" class="form-control" id="txtnombre" name="txtnombre" placeholder=" Ingrese Nombre">
                  </div>

                <div class="form-group">
                    <label for="inputAddress2">Descripcion</label>
                    <input type="text" class="form-control" id="txtdescripcion" name="txtdescripcion" placeholder="Ingrese Descripcion">
                </div>

                <button type="submit" class="btn btn-primary" >Registar</button>
            </form>

        </div>

      </div>
      <!------modal para editar-------->

<div class="modal fade" id="perfil_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="staticBackdropLabel">Editar Categoria</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form id="perfil_editar">
    <div class="modal-body">
           @csrf

            <input type="hidden" id="txtId2" name="txtId2">
            <div class="form-group">
                <label for="inputAddress2">Nombre</label>
                <input type="text" class="form-control" id="txtnombre2" name="txtnombre2" placeholder=" Ingrese Nombre">
              </div>


            <div class="form-group">
                <label for="inputAddress2">Descripcion</label>
                <input type="text" class="form-control" id="txtdescripcion2" name="txtdescripcion2" placeholder="Ingrese Descripcion">
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


<!-- Modal Eliminar-->
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
      <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
      <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-primary">Eliminar</button>
    </div>
  </div>
</div>
</div>

</div> <!-- fin conteiner-->

@endsection
@section('scrip')
<!--------------------listar perfil--------------------------->
<script>
    $(document).ready(function(){
        var tablaperfil=$('#tabla-perfil').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:"{{route('perfil.perfil')}}",
            },
            columns:[
                {data:'per_id'},
                {data:'per_nombre'},
                {data:'per_descripcion'},

                {data:'action',orderable:false}

            ]

        });

    });
</script>
<!-------------------registar nuevo perfil------------------------->
<script>
    $('#registro-perfil').submit(function(e){
        e.preventDefault();
        var nombre=$('#txtnombre').val();
        var descripcion=$('#txtdescripcion').val();
        var _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{route('perfil.registrar')}}",
            type:"POST",
            data:{
                per_nombre:nombre,
                per_descripcion:descripcion,

              _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-perfil')[0].reset();
                    toastr.success('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-perfil').DataTable().ajax.reload();

                }
            }

        });

    });
</script>
<!----------------------------Eliminar----------------------------->
<script>
    var perfil_id;
    $(document).on('click','.delete',function(){
        perfil_id=$(this).attr('id');

        $('#confimodal').modal('show');


    });
    $('#btnEliminar').click(function(){
        $.ajax({
            url:"../perfil/eliminar/"+perfil_id,
            beforeSend:function(){
                $('#btnEliminar').text('Eliminando');
            },
            success:function(data){
                setTimeout(function(){
                    $('#confimodal').modal('hide');
                    toastr.warning('El registro fue eliminado correctamente.','Eliminar Registro',{timeout:3000});
                    $('#tabla-perfil').DataTable().ajax.reload();

                });
                $('#btnEliminar').text('Eliminar');
            }

        });

    });
</script>
<!---------------------editar categoria----------------------------->
<script>
    function editaranimal(id){
        $.get('../perfil/editar/'+id,function(perfil){
            //asignar los datos recuperados
            $('#txtId2').val(perfil[0].per_id);
            $('#txtnombre2').val(perfil[0].per_nombre);
            $('#txtdescripcion2').val(perfil[0].per_descripcion);
            $("input[name=_token]").val();

            $('#perfil_edit_modal').modal('toggle');

        });

    }
</script>
<!--------------------Actualizar categoria------------------------>
<script>
    $('#perfil_editar').submit(function(e){
        e.preventDefault();
        var id2=$('#txtId2').val();
        var nombre2=$('#txtnombre2').val();
        var descripcion2=$('#txtdescripcion2').val();

        var _token2=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('perfil.actualizar')}}",
            type:"post",
            data:{
                per_id:id2,
                per_nombre:nombre2,
                per_descripcion:descripcion2,

                _token: _token2
            },
            success:function(response){
                if(response){
                    $('#perfil_edit_modal').modal('hide');
                    toastr.info('El registro fue actualizado correctamente.','Actualizar Registro',{timeout:3000});
                    $('#tabla-perfil').DataTable().ajax.reload();

                }
            }
        })


    });


</script>
@endsection
