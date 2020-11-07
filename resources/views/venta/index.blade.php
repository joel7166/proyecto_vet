@extends('master')

@section('content')
<!----todo codigo html------>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
        <div class="x_title">
            <h2>Ventas</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form  id="nueva-venta">
                @csrf
                <div class="row">
                    <div class='col-sm-4'>
                        Responsable
                        <div class="form-group">
                        <select class="mi-selector form-control col-sm-12" id="selecodusuario" name="selecodusuario" style="width: 100%;">
                            <option value="0">--seleccione Usuario--</option>
                            @foreach ($usuario as $usuario)
                                <option value="{{$usuario['usu_id']}}">{{$usuario['usu_nombres']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        Cliente
                        <div class="form-group">
                        <select class="mi-selector form-control" id="selecodpropietario" name="selecodpropietario" style="width: 100%;" onchange="venta();">
                            <option value="0">--seleccione Cliente--</option>
                            @foreach ($propietarios as $propietario)
                                <option value="{{$propietario['pro_id']}}">{{$propietario['pro_nombre']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>           
                    <div class='col-sm-4'>
                        Numero de Comprobante
                        <div class="form-group">
                            <input type='text' class="form-control" id="txtNumeroComprobante" name="txtNumeroComprobante" disabled />
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        Tipo de Comprobante
                        <div class="form-group">
                            <select class="mi-selector form-control" id="txtTipoComprobante" name="txtTipoComprobante" style="width: 100%;" >
                                <option value="0">--seleccione--</option>
                                <option value="Factura">Factura</option>
                                <option value="Boleta">Boleta</option>
                            </select>
                        </div>
                    </div> 
                    <div class='col-sm-4'>
                        Fecha
                        <div class="form-group">
                            <input type='datetime' class="form-control" id="txtFecha" name="txtFecha" disabled />
                        </div>
                    </div>
                    </div>
                </div>
            </form>
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
                    <td>Cantidad</td>
                    <td>Precio Unitario</td>
                    <td>Descuento</td>
                    <td>subtotal</td>
                    <td>Acciones</td>
                </thead>
            </table>
            <br>
            <div class="ln_solid"></div>
            
            <div class="row">
                <div class='col-sm-2'>

                    <div class="form-group">
                        <label for="">Impuesto</label>
                        <input type="text" id="txtimpuesto" class="form-control" disabled>
                    </div>
                </div> 
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" id="txttotal" class="form-control" disabled>
                    </div>
                </div>
                <div class='col-sm-4'>
                
                </div>
                <div class='col-sm-4'>
                    <br>
                    <br>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="buttton" id= "btnboleta"class="btnboleta btn btn-info"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Pagar</button></li>
                    </ul>
                    
                </div>
            </div>
                    
        </div>
        
    </div>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoPropietario">Producto<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                        <select class="mi-selector form-control" id="selecodproducto" name="selecodproducto" style="width: 100%;" onchange="prod_precio();">
                        <option value="0">--seleccione Producto--</option>
                            @foreach ($productos as $producto)
                                <option value="{{$producto['prod_id']}}">{{$producto['prod_nombre']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtcantidad">Cantidad<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="number" min="1" max="99" class="form-control" id="txtcantidad" name="txtcantidad" value="1" required>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtTipoComprobante">Precio Venta</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" class="form-control" id="txtprecioventa" name="txtprecioventa"  disabled>
                        </div>

                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdescuento">Descuento<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" class="form-control" id="txtdescuento" name="txtdescuento" value="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnnuevo1" name="btnnuevo" class="btn btn-primary">Agregar Producto</button>
                </div>
            </div>
        </form>

    </div>
</div>
<!--Detalles de venta-->
<div class="modal fade bs-example-modal-lg" id="boleta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"></h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-2" style="width:50px; border-color:#ffffff" >  </div>
                <div class="col-6" style="width:50px; border-color:#ffffff" >
                    <div class="text-center">
                        <h2>Clinica Veterinaria</h2>
                        <h1>Paraiso Animal <span>S.A</span></h1>
                        <p>Ubicanos En la av. Union por el Peru s/n </p>
                        <p>Atencion de Lunes a Sabados</p>
                        <p> 7 a 8 pm</p>
                    </div>
                    
                </div>
                <div class="col-4"  >
                    <div class="text-center" style="border-radius: 5px; border: black 3px solid;">
                        <h5><p>Ruc<span>-015555578975</span></p></h5>
                        <input type="text" id="txtbtipo" style="color:black; whith:20px," disabled>
                        <label >Numero Comprobante</label>
                        <input type="text" value="012416644619" id= "txtbcomprobante" style="color:black; whith:20px" disabled>
                        <br><br>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <br>
                <br><br>
                
                <div class="col-8">
                    <div class="text-inline">
                        <label for="">Señor(es):</label>
                        &nbsp; &nbsp; &nbsp;
                        <input type="text" value="Joel Quispe Ñahui" class="form-control" id="txtbnombre" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-inline">
                        <label for=""> hora y fecha</label>
                        &nbsp;
                        <input type="datetime" value="20/03/2016"  class="form-control" id="txtbfecha" disabled>
                    </div>
                </div>  
                <div class="col-8">
                    <div class="text-inline">
                            <label for="">Direccion :</label>
                            &nbsp; &nbsp;
                            <input type="text" value="Jr. las rosas" id="txtbdireccion" class="form-control" disabled>
                    </div>
                    <br>
                    <br>
                </div>
                
            </div>
            <div class="row">
                <div class = "col-12">
                    <table  id= "tabla-boleta" class="table table-bordered">
                        <thead>
                            <td>Nombre Producto</td>
                            <td>Cantidad</td>
                            <td>Precio Unitario</td>
                            <td>Descuento</td>
                            <td>subtotal</td>
                        </thead>
                        
                    </table>
                    <br>
                    <br>
                </div>
                <div class="ln_solid"></div>
                <div class="col-6">
                    <div class="item form-group">
                        <label for="" class="col-form-label col-md-3 col-sm-3 label-align">Impuesto</label>
                        
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text"   class="form-control" id="txtbimpuesto" value="0" disabled>
                        </div>
                    </div>
                    
                    <div class="item form-group">
                        <label for="" class="col-form-label col-md-3 col-sm-3 label-align">total</label>
                        
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text"   class="form-control" id="txtbtotal" value="0" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Imprimir</button>
        </div>

        </div>
    </div>
</div>

<!--registrar nueva venta--->
<script>
    function venta(){

        codigofecha();
        setTimeout(function(){
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
                        ventaid();
                    }
                }
            });
         },2000);
        setTimeout(function(){
            
            $("#tabla-venta").dataTable().fnDestroy();
            var tablaventa=$('#tabla-venta').DataTable({
            processing:true,
            serverSide:true,
           ajax:{            
            url:"{{route('venta.lista')}}",
          },
          columns:[
            {data:'prod_id'},
            {data:'prod_nombre'},
            {data:'detv_cantidad'},
            {data:'prod_preciou'},
            {data:'detv_descuento'},
            {data:'detv_precio_venta'},
            {data:'action',orderable:false}
             ]
            });

        },2000);

    }
    function ventaid(){
        $.get('../venta/buscar',function(venta){
            //asignar los datos recuperados
            $('#txtid_vent').val(venta[0].ven_id);
        });
    }
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
                   
                    $('#modalnuevoproducto').modal('hide');
                  
                  $('#tabla-venta').DataTable().ajax.reload();
                }
            }
        });
        setTimeout(function(){
            totalImp();
        },1000);
    
    });

    function totalImp(){
        var idven= $('#txtid_vent').val();
        $.get('../venta/mostrar/'+idven,function(venta){
        
        $('#txtimpuesto').val(venta[0].impuesto);
        $('#txttotal').val(venta[0].total);
        });
    }
</script>
<!--mostrar venta producto-->
<script>
    function nuevaventa(){
        
        $.get('../venta/buscar',function(venta){
        
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
<!--selector buscar--->
<script>
    jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
        });
    });
</script>

<!--num comprobante y fecha-->
<script>
    function codigofecha(){
        $.ajax({
            url: "{{route('venta.codigo')}}",
            datatype:'json',
            success:function(codigo){
                $('#txtNumeroComprobante').val(codigo[0].num);
                $('#txtFecha').val(codigo[0].fecha);
                $('#txtimpuesto').val("0");
                $('#txttotal').val("0");
            }
        })
    }
    
</script>
<!--precioProd-->
<script>
 function prod_precio(){
    var id_prod1 = $('#selecodproducto').val();
        $.get('../venta/precio/'+id_prod1,function(precioprod){
            
            $('#txtprecioventa').val(precioprod[0].prod_preciou);
        });
    }
</script>

<!--eliminar venta prod-->

<script>
    var detv_id;
    $(document).on('click','.delete',function(){
        detv_id=$(this).attr('id');
        $.ajax({
            url:"../venta/eliminar/"+detv_id,
            success:function(data){
                setTimeout(function(){
                    $('#tabla-venta').DataTable().ajax.reload();
                    totalImp();
                },1000);
                
            }
        });
    });

</script>
<script>
    $('#btnboleta').click(function(){
        
        var id_vent=$('#txtid_vent').val();
        $.get('../venta/boleta/'+id_vent,function(boleta){
            //asignar los datos recuperados
           
            $('#txtbnombre').val(boleta[0].nombres);
            $('#txtbfecha').val(boleta[0].ven_fecha_hora);
            $('#txtbdireccion').val(boleta[0].direccion);
            $('#txtbimpuesto').val(boleta[0].ven_impuesto);
            $('#txtbcomprobante').val(boleta[0].ven_numero_comprobante);
            $('#txtbtotal').val(boleta[0].ven_total_venta);
            $('#txtbtipo').val(boleta[0].ven_tipo_comprobante);
            $('#boleta').modal('toggle');
        });

         $("#tabla-boleta").dataTable().fnDestroy();
        var tabla=$('#tabla-boleta').DataTable({
            processing:true,
            serverSide:true,
            bPaginate:false,
            bFilter:false,
            bInfo:false,
           ajax:{            
            url:"{{route('venta.boleta')}}",
          },
          columns:[
            
            {data:'prod_nombre'},
            {data:'detv_cantidad'},
            {data:'prod_preciou'},
            {data:'detv_descuento'},
            {data:'detv_precio_venta'},
            
             ]
        });
    
});
</script>
@endsection