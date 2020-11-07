@extends('master')

@section('content')
<!----todo codigo html------>
<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Atencion Medica </h2>
                <ul class="nav navbar-right panel_toolbox">
                    
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
        
                <div class="row">
                    <form action="" id="atencion-medica">
                        <div class='col-sm-4'>
                            Nombre Medico
                            <div class="form-group">
                                <select class="mi-selector form-control" id="selemedico" name="selemedico">
                                    <option value="0">--seleccione Medico--</option>
                                    @foreach ($med as $med)
                                        <option value="{{$med['med_id']}}">{{$med['med_nombre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='col-sm-4'>
                            Servicio
                            <div class="form-group">
                                <select class="mi-selector form-control" id="seleservicio" name="seleservicio" onchange="precioServ();">
                                    <option >--seleccione Servicio--</option>
                                        @foreach ($serv as $serv)
                                            <option value="{{$serv['ser_id']}}">{{$serv['ser_nombre']}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class='col-sm-4'>
                            Nombre Mascota
                            <div class="form-group">
                                <select class="mi-selector form-control" id="selemascota" name="selemascota" onchange="GenAtencion();">
                                    <option value="0">--seleccione Mascota--</option>
                                    @foreach ($ani as $ani)
                                        <option value="{{$ani['ani_id']}}">{{$ani['ani_nombre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>           
                         
                        
                        <div class='col-sm-4'>
                            Diagnostico
                            <div class="form-group">
                                <textarea name="txtdiagnostico" id="txtdiagnostico" cols="80" rows="2" style="width: 100%;"></textarea>
                            </div>
                        </div> 
                        <div class='col-sm-4'>
                            Precio Del Servicio
                            <div class="form-group">
                                <input type='text' class="form-control" id = "txtprecioservicio" disabled />
                            </div>
                        </div> 
                        <div class='col-sm-4'>
                            Fecha y Hora
                            <div class="form-group">
                                <input type='datetime' class="form-control" id = "txtFecha" disabled />
                            </div>
                        </div>
                        
                    </form>
                    
                </div>
                <div class="row">
                    <div class='col-sm-4'>
                    </div>
                    <div class='col-sm-4'>
                    </div>
                    <div class='col-sm-4'>
                    <br>
                      <!--  <div class="text-align-rigth">
                            <button class="btn btn-primary" onclick="GenAtencion();"><i class="fa fa-plus-circle"></i>&nbsp;Nuevo</button>
                        </div>-->
                        
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
        <h2>Detalles de Atencion </h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <button class="btn btn-success" data-toggle="modal" data-target="#modalnuevodetalle"><i class="fa fa-plus-circle"></i>&nbsp; Agregar Detalles</button>
            </li>
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
            Detalles de Atencion 
            <table id="tabla-detalles" class="table table-hover">
                <thead>
                    <td>Id</td>
                    <td>Enfermedad Diagnosticado</td>
                    <td>Medicamento</td>
                    <td>Dosis recomendado</td>
                    <td>Acciones</td>
                </thead>
            </table>
            <br><br><br>

            <div class="ln_solid"></div>
            <div>
                <ul class="nav navbar-right panel_toolbox">
                    <li><button type="buttton" id= "btnboleta"class="btnboleta btn btn-success"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Pagar</button></li>
                </ul>
            </div>
            
        </div>
        
    </div>
    </div>
</div>

<!--agregar detalles de atencion-->
<div class="modal fade" id="modalnuevodetalle"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form  id="agregar-detalle">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detalles Atencion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="txtid_atencion" name="txtid_atencion">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoPropietario">Enfermedad<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                        <select class="mi-selector form-control" id="selenfermedad" name="selenfermedad" style="width: 100%;">
                        <option value="0">--seleccione Enfermedad--</option>
                            @foreach ($enf as $enf)
                                <option value="{{$enf['enf_id']}}">{{$enf['enf_nombre']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtCodigoPropietario">Medicamento<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                        <select class="mi-selector form-control" id="seleproducto" name="seleproducto" style="width: 100%;" >
                        <option value="0">--seleccione Medicamento--</option>
                            @foreach ($prod as $prod)
                                    <option value="{{$prod['prod_id']}}">{{$prod['prod_nombre']}}</option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtdosis">Dosis</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea id="txtdosis" name="txtdosis" class="form-control" cols="20" rows="6"></textarea>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnnuevo1" name="btnnuevo1" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </form>

      </div>
</div>
<!--boleta de atencion-->
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
                            <label ></label>
                            <input type="text" value="" id= "txtbcomprobante" style="color:black; whith:20px" disabled>
                            <br><br>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <br>
                    <br><br>
                    
                    <div class="col-7">
                        <div class="text-inline">
                            <label for="">Señor(es):</label>
                            &nbsp; &nbsp; &nbsp;
                            <input type="text" value="Joel Quispe Ñahui" class="form-control" id="txtbnombre" disabled>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="text-inline">
                            <label for=""> hora y fecha</label>
                            &nbsp;
                            <input type="datetime" value="20/03/2016"  class="form-control" id="txtbfecha" disabled>
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
                                <label for="">Direccion :</label>
                                &nbsp; &nbsp;
                                <input type="text" value="Jr. las rosas" id="txtbdireccion" class="form-control" disabled>
                        </div>
                        <br>
                        <br>
                    </div>

                    <div class="col-7">
                        <div class="text-inline">
                                <label for="">Servicio Prestado:</label>
                                &nbsp; &nbsp;
                                <input type="text" value="Vacunacon" id="txtbservicio" class="form-control" disabled>
                        </div>
                        <br>
                        <br>
                    </div>
                    
                </div>
                <div class="row">
                    <div class = "col-12">
                    <table id="tabla-Boleta" class="table table-bordered">
                        <thead>
                            <td>Enfermedad Diagnosticado</td>
                            <td>Medicamento</td>
                            <td>Dosis recomendado</td>
                            
                        </thead>
                    </table>
                        <br>
                        <br>
                    </div>
                        <div class="ln_solid"></div>
                    <div class="item form-group">
                        <label for="" class="col-form-label col-md-3 col-sm-3 label-align">total Servicio</label>
                        
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text"   class="form-control" id="txtbtotal" value="0" disabled>
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

<script>
    function GenAtencion(){
        var id_medico=$('#selemedico').val();
        var id_mascota=$('#selemascota').val();
        var servicio=$('#seleservicio').val();
        var diagnostico=$('#txtdiagnostico').val();
        
        var _token=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('atencion.registrar')}}",
            type:"POST",
            data:{
                med_id:id_medico,
                ani_id:id_mascota,
                ser_id:servicio,
                det_diagnostico:diagnostico,
                
                _token:_token
            },
            success:function(response){
                if(response){
                    //$('#nueva-atencion')[0].reset();
                   //$('#modalnuevo').modal('hide');
                   horafecha();
                }
            }
        });
        setTimeout(function(){
            nuevaatencion();
            $("#tabla-detalles").dataTable().fnDestroy();
            var tablaventa=$('#tabla-detalles').DataTable({
            processing:true,
            serverSide:true,
           ajax:{            
            url:"{{route('atencion.lista')}}",
          },
          columns:[
            {data:'deta_id'},
            {data:'enf_nombre'},
            {data:'prod_nombre'},
            {data:'deta_dosis'},
            {data:'action',orderable:false}
             ]
            });
            
        },2000);
        
    }
</script>

<!--recuperar fecha y hora -->
<script>
function horafecha(){
    $.ajax({
        url: "{{route('atencion.fecha')}}",
        datatype:'json',
        success:function(fecha_a){
            $('#txtFecha').val(fecha_a[0].fecha);
        }
    })
}
</script>

<!--agregar detalle-->
<script>
    $('#agregar-detalle').submit(function(e){
        e.preventDefault();
        var ate_id=$('#txtid_atencion').val();
        var enf_id=$('#selenfermedad').val();
        var prod_id=$('#seleproducto').val();
        var dosis=$('#txtdosis').val();
        var _token=$("input[name=_token]").val();
        $.ajax({
            url:"{{route('servicio.nuevodetalle')}}",
            type:"POST",
            data:{
                ate_id:ate_id,
                enf_id:enf_id,
                prod_id:prod_id,
                dosis:dosis,
                _token:_token
            },
            success:function(response){
                if(response){
                    $('#tabla-detalles').DataTable().ajax.reload();
                    $('#modalnuevodetalle').modal('hide');
                }
            }
            
        });
       
    });
</script>
<!--mostrar venta producto-->
<script>
    function nuevaatencion(){
        $.get('../atencion/buscar',function(atencion){
        //asignar los datos recuperados
        $('#txtid_atencion').val(atencion[0].ate_id);
            

            
         });
    }

    jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
        });
    });

</script>

<!--eliminar venta prod-->
<script>
    var id;
    $(document).on('click','.delete',function(){
        id=$(this).attr('id');
        console.log("hola mundo cruel");
        $.ajax({
            url:"../atencion/eliminar/"+id,
            success:function(data){
                setTimeout(function(){
                    $('#tabla-detalles').DataTable().ajax.reload();
                },1000);
            }
        });
    });
</script>
<script>
function precioServ(){
        var id_serv = $('#seleservicio').val();
        $.get('../atencion/servicio/'+id_serv,function(precio){
            //asignar los datos recuperados
            $('#txtprecioservicio').val(precio[0].ser_precio);
        });
}
</script>
<!--funcion del modal-->
<script>
    $('#btnboleta').click(function(){
        
       
        var ate_id1=$('#txtid_atencion').val();
        $.get('../atencion/boleta/'+ate_id1,function(Boleta){
            //asignar los datos recuperados
           
            $('#txtbnombre').val(Boleta[0].nombre);
            $('#txtbfecha').val(Boleta[0].ate_fecha_hora);
            $('#txtbdireccion').val(Boleta[0].pro_direccion);
            $('#txtbnombreMascota').val(Boleta[0].animal);
            $('#txtbservicio').val(Boleta[0].ser_nombre);
            $('#txtbcomprobante').val(Boleta[0].ven_numero_comprobante);
            $('#txtbtotal').val(Boleta[0].ser_precio);
            
            
            
        });

         $("#tabla-Boleta").dataTable().fnDestroy();
        var tabla=$('#tabla-Boleta').DataTable({
            processing:true,
            serverSide:true,
            bPaginate:false,
            bFilter:false,
            bInfo:false,
           ajax:{            
            url:"{{route('servicio.boleta')}}",
          },
          columns:[
            
            
            {data:'enf_nombre'},
            {data:'prod_nombre'},
            {data:'deta_dosis'},
            ]

            
        });
        $('#boleta').modal('toggle');
});
</script>
@endsection