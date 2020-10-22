@extends('master')

@section('content')
<!----todo codigo html------>
<div class="container">
    <br>
         <ul class="nav nav-tabs" id="myTab" role="tablist">
             <li class="nav-item" role="presentation">
               <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista Detalle Venta</a>
             </li>
             <li class="nav-item" role="presentation">
               <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nueva Detalle Venta</a>
             </li>
           </ul>
           <div class="tab-content" id="myTabContent">
             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                 <h3>Detalle Venta</h3>
                 <table id="tabla-detalle_venta" class="table table-hover">
                     <thead>
                         <td>CodVenta</td>
                         <td>CodProducto</td>
                         <td>Cantidad</td>
                         <td>PrecioVenta</td>
                         <td>Descuento</td>
                         <td>acciones</td>




                     </thead>
                 </table>
             </div>
             <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                 <div class="col-md-12 col-sm-12 ">
                     <div class="x_panel">
                         <div class="x_content">

                             <h3> Nueva DetalleVenta</h3>
                             <div class="ln_solid"></div>
                             <form id="registro-detalle_venta"data-parsley-validate class="form-horizontal form-label-left">
                                     @csrf
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoUsuario">Codventa<span class="required">*</span></label>
                                     <div class="col-md-6 col-sm-6 ">

                                         <select class="form-control" id="selecodventa" name="selecodventa">
                                            <option value="3">Boleta</option>
                                            <option value="4">Factura</option>
                                            <option value="5">Boleta</option>
                                          </select>
                                     </div>
                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoPropietario">CodProducto<span class="required">*</span></label>
                                     <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="selecodproducto" name="selecodproducto">
                                            <option value="1">Amoxicol</option>
                                            <option value="3">algo</option>
                                          </select>
                                     </div>

                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtNumeroComprobante">Cantidad<span class="required">*</span></label>
                                     <div class="col-md-6 col-sm-6 ">
                                         <input type="text" class="form-control" id="txtcantidad" name="txtcantidad"  required>
                                    </div>

                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtTipoComprobante">PrecioVenta</label>
                                     <div class="col-md-6 col-sm-6 ">
                                         <input type="text" class="form-control" id="txtprecioventa" name="txtprecioventa" >
                                     </div>

                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputFecha">Descuento<span class="required">*</span></label>
                                     <div class="col-md-6 col-sm-6 ">
                                         <input type="text" class="form-control" id="txtdescuento" name="txtdescuento" required>
                                    </div>

                                 </div>


                                 <div class="ln_solid"></div>
                                 <div class="item form-group" >
                                     <div class="col-md-6 col-sm-6 offset-md-3">
                                         <button type="submit" class="btn btn-success" >Registrar </button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>

             </div>

           </div>

        </div>

        <!--listar-->
<script>
    $(document).ready(function(){
        var tablaanimal=$('#tabla-detalle_venta').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:"{{route('ventas.detalleventa')}}",
            },
            columns:[

                {data:'ven_id'},
                {data:'prod_id'},
                {data:'detv_cantidad'},
                {data:'detv_precio_venta'},
                {data:'detv_descuento'},

                {data:'action',orderable:false}
            ]
        });
    });
</script>
<!-------------------registar nueva categoria------------------------->
<script>
    $('#registro-detalle_venta').submit(function(e){
        e.preventDefault();
        var codventa=$('#selecodventa').val();
        var codproducto=$('#selecodproducto').val();
        var cantidad=$('#txtcantidad').val();
        var precioventa=$('#txtprecioventa').val();
        var descuento=$('#txtdescuento').val();

        var _token=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('ventas.registrar')}}",
            type:"POST",
            data:{
                ven_id:codventa,
                prod_id:codproducto,
                detv_cantidad:cantidad,
                detv_precio_venta:precioventa,
                detv_descuento:descuento,

                _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-detalle_venta')[0].reset();
                    //$('#propietario_edit_modal').modal('hide');
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro Insertado Correctamente',
                    showConfirmButton: false,
                    timer: 3000
                    });
                   //toastr.succes('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-detalle_venta').DataTable().ajax.reload();
                }
            }

        });
    });
</script>


@endsection
