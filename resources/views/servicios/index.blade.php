@extends('master')

@section('content')
<!----todo codigo html------>
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de Servicio</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nuevo Servicio</a>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>LISTA DE SERVICIO</h3>
            <table id="tabla-servicio" class="table table-hover">
                <thead>
                    <td>ID</td>
                    <td>NOMBRE</td>
                    <td>PRECIO</td>
                    <td>ACCIONES</td>
                </thead>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">

            <h3>Nuevo Servicio</h3>
            <div class="ln_solid"></div>
            <form id="registro-servicio">
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtnombre">Nombre<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" class="form-control" id="txtnombres" name="txtnombres" >
                  </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdescripcion">Precio<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                     <input type="text" class="form-control" id="txtprecio" name="txtprecio" >
                  </div>
              </div>
              <div class="ln_solid"></div>
              <div class="item form-group" >
                <div class="col-md-6 col-sm-6 offset-md-3">
                <button type="submit" class="btn btn-success" >Registar Servicio</button>
            </div>
           </div>
            </form>
        </div>
    </div>

 </div>
 </div>

 </div>
      <!------modal para editar-------->

<div class="modal fade" id="servicio_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="staticBackdropLabel">Editar Servico</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form id="servicio_editar">
    <div class="modal-body">
           @csrf

            <input type="hidden" id="txtId2" name="txtId2">
            <div class="form-group">
                <label for="inputAddress2">Nombre</label>
                <input type="text" class="form-control" id="txtnombres2" name="txtnombres2" >
              </div>


            <div class="form-group">
                <label for="inputAddress2">Precio</label>
                <input type="text" class="form-control" id="txtprecio2" name="txtprecio2" >
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
        var tablaanimal=$('#tabla-servicio').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:"{{route('servicios.index')}}",
            },
            columns:[
                {data:'ser_id'},
                {data:'ser_nombre'},
                {data:'ser_precio'},

                {data:'action',orderable:false}

            ]

        });

    });
</script>
<!-------------------registar nueva categoria------------------------->
<script>
    $('#registro-servicio').submit(function(e){
        e.preventDefault();
        var nombre=$('#txtnombres').val();
        var precio=$('#txtprecio').val();
        var _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{route('servicios.registrar')}}",
            type:"POST",
            data:{
                ser_nombre:nombre,
                ser_precio:precio,

              _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-servicio')[0].reset();
                    toastr.success('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-servicio').DataTable().ajax.reload();

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
            url:"../servicios/eliminar/"+c_id,
            beforeSend:function(){
                $('#btnEliminar').text('Eliminando');
            },
            success:function(data){
                setTimeout(function(){
                    $('#confimodal').modal('hide');
                    toastr.warning('El registro fue eliminado correctamente.','Eliminar Registro',{timeout:3000});
                    $('#tabla-servicio').DataTable().ajax.reload();

                });
                $('#btnEliminar').text('Eliminar');
            }

        });

    });
</script>
<!---------------------editar servicio----------------------------->
<script>
    function editar(id){
        $.get('../servicios/editar/'+id,function(Servicio){
            //asignar los datos recuperados
            $('#txtId2').val(Servicio[0].ser_id);
            $('#txtnombres2').val(Servicio[0].ser_nombre);
            $('#txtprecio2').val(Servicio[0].ser_precio);
            $("input[name=_token]").val();

            $('#servicio_edit_modal').modal('toggle');

        });

    }

</script>
<!--------------------Actualizar categoria------------------------>
<script>
    $('#servicio_editar').submit(function(e){
        e.preventDefault();
        var id2=$('#txtId2').val();
        var nombre2=$('#txtnombres2').val();
        var precio2=$('#txtprecio2').val();

        var _token2=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('servicios.actualizar')}}",
            type:"post",
            data:{
                ser_id:id2,
                ser_nombre:nombre2,
                ser_precio:precio2,

                _token: _token2
            },
            success:function(response){
                if(response){
                    $('#servicio_edit_modal').modal('hide');
                    toastr.info('El registro fue actualizado correctamente.','Actualizar Registro',{timeout:3000});
                    $('#tabla-servicio').DataTable().ajax.reload();

                }
            }
        })


    });
</script>
@endsection
