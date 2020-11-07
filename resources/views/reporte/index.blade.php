@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Reporte de Ventas</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                </ul>
            
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            
            <table id="tabla-reporte" class="table table-hover">
                <thead>
                    <td>Nombre Vendedor</td>
                    <td>Celular Vendedor</td>
                    <td>Nombre cliente</td>
                    <td>Telefono cliente</td>
                    <td>Direccion Cliente</td>
                    <td>Fecha Venta</td>
                    <td>Total Venta</td>
                    <td>Acciones</td>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Reporte de Atencion Medica</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                </ul>
            
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tabla-reporte-atencion" class="table table-hover">
                    <thead>
                        <td>Nombre Medico</td>
                        <td>Nombre Propietario</td>
                        <td>Nombre Mascota</td>
                        <td>Servicio Prestado</td>
                        <td>Fecha Atencion</td>
                        <td>Precio Servicio</td>
                        
                        <td>Acciones</td>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Modal - Detalle-Venta -->
<div class="modal fade bs-example-modal-lg" id="modal_detalle_venta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Detalle Venta</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <br>
                <br><br>
                
                <div class="col-8">
                    <div class="text-inline">
                        <label for="">Nombre Cliente</label>
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
                            <label for="">Direccion Cliente:</label>
                            &nbsp; &nbsp;
                            <input type="text" value="Jr. las rosas" id="txtbdireccion" class="form-control" disabled>
                    </div>
                    
                </div>
                <div class="col-8">
                    <div class="text-inline">
                            <label for="">Telefono Cliente:</label>
                            &nbsp; &nbsp;
                            <input type="text" value="J998211" id="txtbtelefono" class="form-control" disabled>
                    </div>
                    
                </div>
                <div class="col-8">
                    <div class="text-inline">
                            <label for="">Nombre Vendedor(a):</label>
                            &nbsp; &nbsp;
                            <input type="text" value=" Silvia Peña" id="txtbvendedor" class="form-control" disabled>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class = "col-12">
                    <div class="text-center">
                        <br><br>
                        <p><h5>Productos Comprados</h5></p>
                    </div>
                    <br>
                    <table  id= "tabla_detalle_ventas" class="table table-bordered">
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
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            
        </div>

        </div>
    </div>
</div>

<!--Modal - Detalle-Atencion -->
<div class="modal fade bs-example-modal-lg" id="modal_detalle_atencion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Detalle Atencion</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            
        <div class="row">
            
            <br><br>
            
            <div class="col-7">
                <div class="text-inline">
                    <label for="">Nombre Proietario(a):</label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="text" value="Joel Quispe Ñahui" class="form-control" id="txtbnombreP" disabled>
                </div>
            </div>
            <div class="col-5">
                <div class="text-inline">
                    <label for=""> hora y fecha</label>
                    &nbsp;
                    <input type="datetime" value="20/03/2016"  class="form-control" id="txtbfechaA" disabled>
                </div>
            </div>  
            <div class="col-7">
                <div class="text-inline">
                        <label for="">Nombre de la Mascota:</label>
                        &nbsp; &nbsp;
                        <input type="text" value="Mascotita" id="txtbnombreMascota" class="form-control" disabled>
                </div>
                <br>
                <br>
            </div>
            <div class="col-5">
                <div class="text-inline">
                        <label for="">Direccion Propietario:</label>
                        &nbsp; &nbsp;
                        <input type="text" value="Jr. las rosas" id="txtbdireccionP" class="form-control" disabled>
                </div>
                <br>
                <br>
            </div>
            <div class="col-7">
                <div class="text-inline">
                        <label for="">Nombre Medico:</label>
                        &nbsp; &nbsp;
                        <input type="text" value="Alguien" id="txtmedico" class="form-control" disabled>
                </div>
                <br>
                <br>
            </div>
            <div class="col-7">
                <div class="text-inline">
                        <label for="">Servicio Prestado:</label>
                        &nbsp; &nbsp;
                        <input type="text" value="Vacunacion" id="txtbservicio" class="form-control" disabled>
                </div>
                <br>
                <br>
            </div>
            
        </div>
        <div class="row">
            <div class = "col-12">
                <table id="tabla_detalle_atencion" class="table table-bordered">
                    <thead>
                        <td>Enfermedad Diagnosticado</td>
                        <td>Medicamento</td>
                        <td>Dosis recomendado</td>
                        
                    </thead>
                </table>
                <br><br>
                    
            </div>
                <div class="ln_solid"></div>
            
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            
        </div>

        </div>
    </div>
</div>

<!--detalle - venta -->
<script>
    function detalle_venta(id){
        $.get('../reporte/venta/'+id,function(detalleVenta){
            $('#txtbnombre').val(detalleVenta[0].nombres);
            $('#txtbfecha').val(detalleVenta[0].ven_fecha_hora);
            $('#txtbdireccion').val(detalleVenta[0].direccion);
            $('#txtbtelefono').val(detalleVenta[0].pro_telefono);
            $('#txtbvendedor').val(detalleVenta[0].nombre_usuario);

            $('#modal_detalle_venta').modal('toggle');

        });
        $("#tabla_detalle_ventas").dataTable().fnDestroy();
        var tabla=$('#tabla_detalle_ventas').DataTable({
            processing:true,
            serverSide:true,
            bPaginate:false,
            bFilter:false,
            bInfo:false,
           ajax:{            
            url:'../reporte/lista_ventas/'+id,
          },
          columns:[
            
            {data:'prod_nombre'},
            {data:'detv_cantidad'},
            {data:'prod_preciou'},
            {data:'detv_descuento'},
            {data:'detv_precio_venta'},
            
             ]
        });

    }
</script>

<!--detalle - Atencion -->
<script>
    function detalle_atencion(id){
        $.get('../detalle/atencion/'+id,function(detAtencion){
            $('#txtbnombreP').val(detAtencion[0].nombre);
            $('#txtbfechaA').val(detAtencion[0].ate_fecha_hora);
            $('#txtbnombreMascota').val(detAtencion[0].animal);
            $('#txtbdireccionP').val(detAtencion[0].pro_direccion);
            $('#txtmedico').val(detAtencion[0].nombre_medico);
            $('#txtbservicio').val(detAtencion[0].ser_nombre);

            $('#modal_detalle_atencion').modal('toggle');

        });

        $("#tabla_detalle_atencion").dataTable().fnDestroy();
        var tabla=$('#tabla_detalle_atencion').DataTable({
            processing:true,
            serverSide:true,
            bPaginate:false,
            bFilter:false,
            bInfo:false,
           ajax:{            
            url:'../reporte/detAtencion/'+id,
          },
          columns:[
            {data:'enf_nombre'},
            {data:'prod_nombre'},
            {data:'deta_dosis'},
            ]
            
        });

    }
</script>

<!--reporte - ventas-->
<script>
  $(document).ready(function(){
      var reporteventa=$('#tabla-reporte').DataTable({
          processing:true,
          serverSide:true,
          ajax:{
              url:"{{route('reporte.index')}}",
          },
          columns:[
              {data:'nombre_usuario'},
              {data:'usu_celular'},
              {data:'nombre_propietario'},
              {data:'pro_telefono'},
              {data:'direccion'},
              {data:'ven_fecha_hora'},
              {data:'ven_total_venta'},
              {data:'action',orderable:false}
          ]
      });
  });
</script>

<script>
  $(document).ready(function(){
      var reporteAtencion=$('#tabla-reporte-atencion').DataTable({
          processing:true,
          serverSide:true,
          ajax:{
              url:"{{route('reporte.atencion')}}",
          },
          columns:[
              {data:'nombre_medico'},
              {data:'nombre_propietario'},
              {data:'ani_nombre'},
              {data:'ser_nombre'},
              {data:'ate_fecha_hora'},
              {data:'ser_precio'},
              
              {data:'action',orderable:false}
          ]
      });
  });
</script>
@endsection