@extends('master')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de producto</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo producto</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>LISTA DE PRODUCTO</h3>
            <table id="tabla-producto" class="table table-hover">
                <thead>
                    <td>ID</td>
                    <td>CODIGO</td>
                    <td>CATEGORIA</td>
                    <td>NOMBRE</td>
                    <td>STOCK</td>
                    <td>DESCRIPCION</td>
                    <td>ACCIONES</td>
                </thead>
            </table>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <h3>Nuev Producto</h3>
            <form id="registro-producto">
                @csrf
                
                <div class="form-group">
                    <label for="seleperfil">CodigoCategoria</label>
                    <select class="form-control" id="selecodcategoria" name="selecodcategoria">
                      <option value="1">antibiotico</option>
                      <option value="2">anastesicos</option>
                      <option value="4">ampicilina</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Codigo</label>
                    <input type="text" class="form-control" id="txtcodigo" name="txtcodigo" placeholder=" Ingrese Codigo">
                  </div>

                <div class="form-group">
                    <label for="inputAddress2">Nombre</label>
                    <input type="text" class="form-control" id="txtnombre" name="txtnombre" placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                    <label for="inputAddress2">Stock</label>
                    <input type="numeric" class="form-control" id="txtstock" name="txtstock" placeholder="Ingrese Stock">
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

<div class="modal fade" id="producto_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form id="producto_editar">
    <div class="modal-body">
           @csrf

            <input type="hidden" id="txtId2" name="txtId2">
            <div class="form-group">
                <label for="seleperfil">CodigoCategoria</label>
                <select class="form-control" id="selecodcategoria2" name="selecodcategoria2">
                  <option value="1">antibiotico</option>
                  <option value="2">anastesicos</option>
                  <option value="4">ampicilina</option>

                </select>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Codigo</label>
                <input type="text" class="form-control" id="txtcodigo2" name="txtcodigo2" placeholder=" Ingrese Codigo">
              </div>

            <div class="form-group">
                <label for="inputAddress2">Nombre</label>
                <input type="text" class="form-control" id="txtnombre2" name="txtnombre2" placeholder="Ingrese Nombre">
            </div>

            <div class="form-group">
                <label for="inputAddress2">Stock</label>
                <input type="numeric" class="form-control" id="txtstock2" name="txtstock2" placeholder="Ingrese Stock">
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

<!----------------------Listar producto------------------------->
<script>
    $(document).ready(function(){
        var tablaanimal=$('#tabla-producto').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:"{{route('producto.producto')}}",
            },
            columns:[
                {data:'prod_id'},
                {data:'prod_codigo'},
                {data:'catp_nombre'},
                {data:'prod_nombre'},
                {data:'prod_stock'},
                {data:'prod_descripcion'},
                {data:'action',orderable:false}

            ]

        });

    });
</script>
<!-------------------registar nueva categoria------------------------->
<script>
    $('#registro-producto').submit(function(e){
        e.preventDefault();
        var categoria=$('#selecodcategoria').val();
        var codigo=$('#txtcodigo').val();
        var nombre=$('#txtnombre').val();
        var stock=$('#txtstock').val();
        var descripcion=$('#txtdescripcion').val();
        var _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{route('producto.registrar')}}",
            type:"POST",
            data:{
                catp_id:categoria,
                prod_codigo:codigo,
                prod_nombre:nombre,
                prod_stock:stock,
                prod_descripcion:descripcion,

              _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-producto')[0].reset();
                    toastr.success('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-producto').DataTable().ajax.reload();

                }
            }

        });

    });
</script>
<!----------------------------Eliminar----------------------------->
<script>
    var p_id;
    $(document).on('click','.delete',function(){
        p_id=$(this).attr('id');

        $('#confimodal').modal('show');


    });
    $('#btnEliminar').click(function(){
        $.ajax({
            url:"../producto/eliminar/"+p_id,
            beforeSend:function(){
                $('#btnEliminar').text('Eliminando');
            },
            success:function(data){
                setTimeout(function(){
                    $('#confimodal').modal('hide');
                    toastr.warning('El registro fue eliminado correctamente.','Eliminar Registro',{timeout:3000});
                    $('#tabla-producto').DataTable().ajax.reload();

                });
                $('#btnEliminar').text('Eliminar');
            }

        });

    });
</script>
<!---------------------editar categoria----------------------------->
<script>
    function editaranimal(id){
        $.get('../producto/editar/'+id,function(producto){
            //asignar los datos recuperados
            $('#txtId2').val(producto[0].prod_id);
            $('#selecodcategoria2').val(producto[0].catp_id)
            $('#txtcodigo2').val(producto[0].prod_codigo);
            $('#txtnombre2').val(producto[0].prod_nombre);
            $('#txtstock2').val(producto[0].prod_stock);
            $('#txtdescripcion2').val(producto[0].prod_descripcion);
            $("input[name=_token]").val();

            $('#producto_edit_modal').modal('toggle');

        });

    }

</script>
<!--------------------Actualizar categoria------------------------>
<script>
    $('#producto_editar').submit(function(e){
        e.preventDefault();
        var id2=$('#txtId2').val();
        var categoria2=$('#selecodcategoria2').val();
        var codigo2=$('#txtcodigo2').val();
        var nombre2=$('#txtnombre2').val();
        var stock2=$('#txtstock2').val();
        var descripcion2=$('#txtdescripcion2').val();

        var _token2=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('producto.actualizar')}}",
            type:"post",
            data:{

                prod_id:id2,
                catp_id:categoria2,
                prod_codigo:codigo2,
                prod_nombre:nombre2,
                prod_stock:stock2,
                prod_descripcion:descripcion2,

                _token: _token2
            },
            success:function(response){
                if(response){
                    $('#producto_edit_modal').modal('hide');
                    toastr.info('El registro fue actualizado correctamente.','Actualizar Registro',{timeout:3000});
                    $('#tabla-producto').DataTable().ajax.reload();

                }
            }
        })


    });
</script>
@endsection
