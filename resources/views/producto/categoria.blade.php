@extends('master')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de categoria</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo categoria</a>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>LISTA DE CATEGORIA</h3>
            <table id="tabla-categoria" class="table table-hover">
                <thead>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>DESCRIPCION</td>
                    <td>ACCIONES</td>
                </thead>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <h3>Nueva Categoria</h3>
            <form id="registro-categoria">
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

<div class="modal fade" id="categoria_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="staticBackdropLabel">Editar Categoria</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form id="categoria_editar">
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

<script>
    $(document).ready(function(){
        var tablaanimal=$('#tabla-categoria').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:"{{route('producto.categoria')}}",
            },
            columns:[
                {data:'catp_id'},
                {data:'catp_nombre'},
                {data:'catp_descripcion'},

                {data:'action',orderable:false}

            ]

        });

    });


</script>
<!-------------------registar nueva categoria------------------------->
<script>
    $('#registro-categoria').submit(function(e){
        e.preventDefault();
        var nombre=$('#txtnombre').val();
        var descripcion=$('#txtdescripcion').val();
        var _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{route('categoria.registrar')}}",
            type:"POST",
            data:{
                catp_nombre:nombre,
                catp_descripcion:descripcion,

              _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-categoria')[0].reset();
                    toastr.success('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-categoria').DataTable().ajax.reload();

                }
            }

        });

    });
</script>
<!----------------------------Eliminar----------------------------->
<script>
    var c_id;
    $(document).on('click','.delete',function(){
        c_id=$(this).attr('id');

        $('#confimodal').modal('show');


    });
    $('#btnEliminar').click(function(){
        $.ajax({
            url:"../producto/categoria/eliminar/"+c_id,
            beforeSend:function(){
                $('#btnEliminar').text('Eliminando');
            },
            success:function(data){
                setTimeout(function(){
                    $('#confimodal').modal('hide');
                    toastr.warning('El registro fue eliminado correctamente.','Eliminar Registro',{timeout:3000});
                    $('#tabla-categoria').DataTable().ajax.reload();

                });
                $('#btnEliminar').text('Eliminar');
            }

        });

    });
</script>

<!---------------------editar categoria----------------------------->
<script>
    function editaranimal(id){
        $.get('../producto/categoria/editar/'+id,function(categoria){
            //asignar los datos recuperados
            $('#txtId2').val(categoria[0].catp_id);
            $('#txtnombre2').val(categoria[0].catp_nombre);
            $('#txtdescripcion2').val(categoria[0].catp_descripcion);
            $("input[name=_token]").val();

            $('#categoria_edit_modal').modal('toggle');

        });

    }

</script>
<!--------------------Actualizar categoria------------------------>
<script>
    $('#categoria_editar').submit(function(e){
        e.preventDefault();
        var id2=$('#txtId2').val();
        var nombre2=$('#txtnombre2').val();
        var descripcion2=$('#txtdescripcion2').val();

        var _token2=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('categoria.actualizar')}}",
            type:"post",
            data:{
                catp_id:id2,
                catp_nombre:nombre2,
                catp_descripcion:descripcion2,

                _token: _token2
            },
            success:function(response){
                if(response){
                    $('#categoria_edit_modal').modal('hide');
                    toastr.info('El registro fue actualizado correctamente.','Actualizar Registro',{timeout:3000});
                    $('#tabla-categoria').DataTable().ajax.reload();

                }
            }
        })


    });


</script>


@endsection
