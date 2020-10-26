@extends('master')

@section('content')
<!----todo codigo html------>
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de Enfermedad</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nueva Enfermedad</a>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3>LISTA DE ENFERMEDAD</h3>
            <table id="tabla-enfermedad" class="table table-hover">
                <thead>
                    <td>ID</td>
                    <td>NOMBRE</td>
                    <td>DESCRIPCION</td>
                    <td>ACCIONES</td>
                </thead>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">

            <h3>Nueva Enfermedad</h3>
            <div class="ln_solid"></div>
            <form id="registro-enfermedad">
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtnombre">Nombre<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" class="form-control" id="txtnombre" name="txtnombre" >
                  </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdescripcion">Descripcion<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                     <input type="text" class="form-control" id="txtdescripcion" name="txtdescripcion" >
                  </div>
              </div>
              <div class="ln_solid"></div>
              <div class="item form-group" >
                <div class="col-md-6 col-sm-6 offset-md-3">
                <button type="submit" class="btn btn-success" >Registar </button>
            </div>
           </div>
            </form>
        </div>
    </div>

 </div>
 </div>

 </div>
      <!------modal para editar-------->

<div class="modal fade" id="enfermedad_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="staticBackdropLabel">Editar Enfermedad</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form id="enfermedad_editar">
    <div class="modal-body">
           @csrf

            <input type="hidden" id="txtId2" name="txtId2">
            <div class="form-group">
                <label for="inputAddress2">Nombre</label>
                <input type="text" class="form-control" id="txtnombre2" name="txtnombre2" >
              </div>


            <div class="form-group">
                <label for="inputAddress2">Descripcion</label>
                <input type="text" class="form-control" id="txtdescripcion2" name="txtdescripcion2" >
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
        var tablaanimal=$('#tabla-enfermedad').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:"{{route('atencionmedica.index')}}",
            },
            columns:[
                {data:'enf_id'},
                {data:'enf_nombre'},
                {data:'enf_descripcion'},

                {data:'action',orderable:false}

            ]

        });

    });
</script>
<!-------------------registar nueva categoria------------------------->
<script>
    $('#registro-enfermedad').submit(function(e){
        e.preventDefault();
        var nombre=$('#txtnombre').val();
        var descripcion=$('#txtdescripcion').val();
        var _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{route('atencionmedica.registrar')}}",
            type:"POST",
            data:{
                enf_nombre:nombre,
                enf_descripcion:descripcion,

              _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-enfermedad')[0].reset();
                    toastr.success('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-enfermedad').DataTable().ajax.reload();

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
            url:"../atencionmedica/eliminar/"+c_id,
            beforeSend:function(){
                $('#btnEliminar').text('Eliminando');
            },
            success:function(data){
                setTimeout(function(){
                    $('#confimodal').modal('hide');
                    toastr.warning('El registro fue eliminado correctamente.','Eliminar Registro',{timeout:3000});
                    $('#tabla-enfermedad').DataTable().ajax.reload();

                });
                $('#btnEliminar').text('Eliminar');
            }

        });

    });
</script>
<!---------------------editar servicio----------------------------->
<script>
    function editar(id){
        $.get('../atencionmedica/editar/'+id,function(enfermedad){
            //asignar los datos recuperados
            $('#txtId2').val(enfermedad[0].enf_id);
            $('#txtnombre2').val(enfermedad[0].enf_nombre);
            $('#txtdescripcion2').val(enfermedad[0].enf_descripcion);
            $("input[name=_token]").val();

            $('#enfermedad_edit_modal').modal('toggle');

        });

    }

</script>
<!--------------------Actualizar categoria------------------------>
<script>
    $('#enfermedad_editar').submit(function(e){
        e.preventDefault();
        var id2=$('#txtId2').val();
        var nombre2=$('#txtnombre2').val();
        var descripcion2=$('#txtdescripcion2').val();

        var _token2=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('atencionmedica.actualizar')}}",
            type:"post",
            data:{
                enf_id:id2,
                enf_nombre:nombre2,
                enf_descripcion:descripcion2,

                _token: _token2
            },
            success:function(response){
                if(response){
                    $('#enfermedad_edit_modal').modal('hide');
                    toastr.info('El registro fue actualizado correctamente.','Actualizar Registro',{timeout:3000});
                    $('#tabla-enfermedad').DataTable().ajax.reload();

                }
            }
        })


    });
</script>



@endsection
