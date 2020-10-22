@extends('master')

@section('content')
<!----todo codigo html------>
<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
        <div class="x_title">
            <h2>Ventas</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalnuevo"><i class="fa fa-plus-circle"></i>&nbsp;Nueva Venta</button>
                </li>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class='col-sm-4'>
                    Responsable
                    <div class="form-group">
                        <input type='text' class="form-control" id="txtnombre_usu" disabled />
                    </div>
                </div>
                <div class='col-sm-4'>
                    Cliente
                    <div class="form-group">
                        <input type='text' class="form-control" id="txtnombre_cli" disabled />
                    </div>
                </div>           
                <div class='col-sm-4'>
                    Numero de Comprobante
                    <div class="form-group">
                        <input type='text' class="form-control"id="txtcombrobante" disabled />
                    </div>
                </div>  
                <div class='col-sm-4'>
                    Tipo de Comprobante
                    <div class="form-group">
                        <input type='text' class="form-control"  id="txtipo_comprobante" disabled />
                    </div>
                </div> 
                <div class='col-sm-4'>
                    Fecha
                    <div class="form-group">
                        <input type='datetime' class="form-control" id = "txtfecha" disabled />
                    </div>
                </div> 
                <div class='col-sm-4'>
                    Impuesto
                    <div class="form-group">
                        <input type='text' class="form-control"  id = "txtimpuesto" disabled/>
                    </div>
                </div> 

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
        <h2>Productos</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <button class="btn btn-success" data-toggle="modal" data-target="#modalnuevoproducto"><i class="fa fa-plus-circle"></i>&nbsp;Agregar Producto</button>
            </li>
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            
        </ul>
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
            productos comprados
            <table id="tabla-venta" class="table table-hover">
                <thead>
                    <td>Id Producto</td>
                    <td>Nombre Producto</td>
                    <td>Precio Unitario</td>
                    <td>Cantidad</td>
                    <td>Impuesto</td>
                    <td>Subtotal</td>
                    <td>Acciones</td>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>parecetamol</td>
                        <td>12</td>
                        <td>3</td>
                        <td>16</td>
                        <td>250</td>
                    </tr>
                    
                </tbody>
            </table>
            <br>
            <div class="ln_solid"></div>
            
            <div class="row">
                <div class='col-sm-4'>

                    <div class="form-group">
                    <label for="">Total </label>
                    <input type="text" id="Total" class="form-control" disabled>
                   
                    </div>
                </div> 
                <div class='col-sm-4'>

                </div>
                <div class='col-sm-4'>
                    <br>
                    <br>
                    <button type="buttton" class="btn btn-info" >Generar Boleta</button>
                    <button type="buttton" class="btn btn-success" >Generar Factura</button>
                </div>
            </div>
                    
        </div>
        
    </div>
    </div>
</div>
<!--nueva venta--->
<div class="modal fade" id="modalnuevo"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form  id="nueva-venta">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">nueva Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoUsuario">Responsable<span class="required">*</span></label>
                            <div class="col-md-7 col-sm-7 ">
                                <select class="form-control" id="selecodusuario" name="selecodusuario">
                                <option value="2">Liz</option>
                                <option value="5">Juberth</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoPropietario">Cliente<span class="required">*</span></label>
                            <div class="col-md-7 col-sm-7 ">
                            <select class="form-control" id="selecodpropietario" name="selecodpropietario">
                                <option value="2">Max</option>
                                <option value="5">Maria</option>
                                </select>
                            </div>

                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtNumeroComprobante">NumeroComprobante<span class="required">*</span></label>
                            <div class="col-md-7 col-sm-7 ">
                                <input type="text" class="form-control" id="txtNumeroComprobante" name="txtNumeroComprobante"  required>
                        </div>

                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtTipoComprobante">TipoComprobante</label>
                            <div class="col-md-7 col-sm-7 ">
                                <input type="text" class="form-control" id="txtTipoComprobante" name="txtTipoComprobante" >
                            </div>

                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputFecha">Fecha<span class="required">*</span></label>
                            <div class="col-md-7 col-sm-7 ">
                                <input type="datetime-local" class="form-control" id="txtFecha" name="txtFecha" required>
                        </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputAddress2">Impuesto</label>
                            <div class="col-md-7 col-sm-7 ">
                                <input type="decimal" class="form-control" id="txtImpuesto" name="txtImpuesto"  value="0.18" >
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnnuevo" name="btnnuevo" class="btn btn-primary">Generar Venta</button>
                </div>
            </div>

        </form>

      </div>
</div>
<!--agregar producto-->
<div class="modal fade" id="modalnuevoproducto"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form  id="agregar-producto">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="txtid_vent" name="txtid_vent">
                    
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoPropietario">CodProducto<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="selecodproducto" name="selecodproducto">
                            <option value="4">paracetamol</option>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnnuevo" name="btnnuevo" class="btn btn-primary">Agregar Producto</button>
                </div>
            </div>
        </form>

      </div>
</div>

<!--registrar nueva venta--->
<script>
    $('#nueva-venta').submit(function(e){
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
            url:"{{route('venta.registrar')}}",
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
                   // $('#nueva-venta')[0].reset();
                   $('#modalnuevo').modal('hide');
                    /* Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'venta generado Correctamente',
                    showConfirmButton: false,
                    timer: 3000
                    });*/
                    nuevaventa();
                   toastr.succes('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    //$('#tabla-venta').DataTable().ajax.reload();
                }
            }
        });
    });
</script>

<!--agregar producto-->
<script>
    $('#agregar-producto').submit(function(e){
        e.preventDefault();
        var codventa=$('#txtid_vent').val();
        var codproducto=$('#selecodproducto').val();
        var cantidad=$('#txtcantidad').val();
        var precioventa=$('#txtprecioventa').val();
        var descuento=$('#txtdescuento').val();
        var _token=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('venta.nuevoproducto')}}",
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
                    //$('#registro-detalle_venta')[0].reset();
                    $('#modalnuevoproducto').modal('hide');
                    /*Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Producto Agregado Correctamente',
                    showConfirmButton: false,
                    timer: 3000
                    });*/
                    
                  toastr.succes('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    //$('#tabla-detalle_venta').DataTable().ajax.reload();
                }
            }

        });
    });
</script>
<script>
function nuevaventa(){
        $.get('../venta/buscar',function(venta){
        //asignar los datos recuperados
        $('#txtid_vent').val(venta[0].ven_id);
        $('#txtnombre_usu').val(venta[0].usu_nombres);
        $('#txtnombre_cli').val(venta[0].pro_nombre);
        $('#txtcombrobante').val(venta[0].ven_numero_comprobante);
        $('#txtipo_comprobante').val(venta[0].ven_tipo_comprobante);
        $('#txtfecha').val(venta[0].ven_fecha_hora);
        $('#txtimpuesto').val(venta[0].ven_impuesto);
        $("input[name=_token]").val();      
        });
    }
</script>
@endsection