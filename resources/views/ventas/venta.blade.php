@extends('master')

@section('content')
<!----todo codigo html------>
<div class="container">
    <br>
         <ul class="nav nav-tabs" id="myTab" role="tablist">
             <li class="nav-item" role="presentation">
               <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista Venta</a>
             </li>
             <li class="nav-item" role="presentation">
               <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nueva Venta</a>
             </li>
           </ul>
           <div class="tab-content" id="myTabContent">
             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                 <h3>Venta</h3>
                 <table id="tabla-venta" class="table table-hover">
                     <thead>
                         <td>codigousuario</td>
                         <td>CodigoPropietario</td>
                         <td>NumeroComprobante</td>
                         <td>TipoComprobante</td>
                         <td>Fecha</td>
                         <td>Impuesto</td>
                         <td>total</td>
                         <td>acciones</td>
                     </thead>
                 </table>
             </div>
             <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                 <div class="col-md-12 col-sm-12 ">
                     <div class="x_panel">
                         <div class="x_content">
                             <h3> Nueva Venta</h3>
                             <div class="ln_solid"></div>
                             <form id="registro-venta"data-parsley-validate class="form-horizontal form-label-left">
                                     @csrf
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoUsuario">CodigoUsuario<span class="required">*</span></label>
                                     <div class="col-md-6 col-sm-6 ">

                                         <select class="form-control" id="selecodusuario" name="selecodusuario">
                                            <option value="1">maria</option>
                                            <option value="2">ana</option>
                                          </select>
                                     </div>
                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoPropietario">CodigoPropietario<span class="required">*</span></label>
                                     <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="selecodpropietario" name="selecodpropietario">
                                            <option value="2">pequi</option>
                                            <option value="4">joel</option>
                                          </select>
                                     </div>

                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtNumeroComprobante">NumeroComprobante<span class="required">*</span></label>
                                     <div class="col-md-6 col-sm-6 ">
                                         <input type="text" class="form-control" id="txtNumeroComprobante" name="txtNumeroComprobante"  required>
                                    </div>

                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtTipoComprobante">TipoComprobante</label>
                                     <div class="col-md-6 col-sm-6 ">
                                         <input type="text" class="form-control" id="txtTipoComprobante" name="txtTipoComprobante" >
                                     </div>

                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputFecha">Fecha<span class="required">*</span></label>
                                     <div class="col-md-6 col-sm-6 ">
                                         <input type="date" class="form-control" id="txtFecha" name="txtFecha" required>
                                    </div>

                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputAddress2">Impuesto</label>
                                     <div class="col-md-6 col-sm-6 ">
                                         <input type="text" class="form-control" id="txtImpuesto" name="txtImpuesto" >
                                      </div>

                                 </div>
                                 <div class="item form-group">
                                     <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputAddress2">Total Venta</label>
                                     <div class="col-md-6 col-sm-6 ">
                                         <input type="text" class="form-control" id="txtTotalVenta" name="txtTotalVenta" >
                                     </div>

                                 </div>
                                 <div class="ln_solid"></div>
                                 <div class="item form-group" >
                                     <div class="col-md-6 col-sm-6 offset-md-3">
                                         <button type="submit" class="btn btn-success" >Registrar Venta</button>
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
        var tablaanimal=$('#tabla-venta').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                url:"{{route('ventas.venta')}}",
            },
            columns:[

                {data:'usu_id'},
                {data:'pro_id'},
                {data:'ven_numero_comprobante'},
                {data:'ven_tipo_comprobante'},
                {data:'ven_fecha_hora'},
                {data:'ven_impuesto'},
                {data:'ven_total_venta'},

                {data:'action',orderable:false}
            ]
        });
    });
</script>
<!-------------------registar nueva venta------------------------->
<script>
    $('#registro-venta').submit(function(e){
        e.preventDefault();
        var codusuario=$('#selecodusuario').val();
        var codpropietario=$('#selecodpropietario').val();
        var numerocomprobante=$('#txtNumeroComprobante').val();
        var tipocomprobante=$('#txtTipoComprobante').val();
        var fecha=$('#txtFecha').val();
        var impuesto=$('#txtImpuesto').val();
        var total=$('#txtTotalVenta').val();
        var _token=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('ventas.registrar')}}",
            type:"POST",
            data:{
                usu_id:codusuario,
                pro_id:codpropietario,
                ven_numero_comprobante:numerocomprobante,
                ven_tipo_comprobante:tipocomprobante,
                ven_fecha_hora:fecha,
                ven_impuesto:impuesto,
                ven_total_venta:total,
                _token:_token
            },
            success:function(response){
                if(response){
                    $('#registro-venta')[0].reset();
                    //$('#propietario_edit_modal').modal('hide');
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro Insertado Correctamente',
                    showConfirmButton: false,
                    timer: 3000
                    });
                   //toastr.succes('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    $('#tabla-venta').DataTable().ajax.reload();
                }
            }

        });
    });
</script>


@endsection
