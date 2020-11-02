@extends('master')

@section('content')
<!----todo codigo html------>
<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
        <div class="x_title">
            <h2>Atencion Medica </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalnuevo"><i class="fa fa-plus-circle"></i>&nbsp;Nueva Atencion</button>
                </li>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class='col-sm-4'>
                    Nombre Medico
                    <div class="form-group">
                        <input type='text' class="form-control" id="txtnombre_med" disabled />
                    </div>
                </div>
                <div class='col-sm-4'>
                    Nombre Mascota
                    <div class="form-group">
                        <input type='text' class="form-control" id="txtnombre_mas" disabled />
                    </div>
                </div>           
                <div class='col-sm-4'>
                    Servicio
                    <div class="form-group">
                        <input type='text' class="form-control"id="txtservicio" disabled />
                    </div>
                </div>  
                
                <div class='col-sm-4'>
                   
                </div> 
                <div class='col-sm-4'>
                    
                </div> 
                <div class='col-sm-4'>
                    Fecha y Hora
                    <div class="form-group">
                        <input type='datetime' class="form-control" id = "txtfecha" disabled />
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
                    <td>Id Atencion</td>
                    <td>Enfermedad Diagnosticado</td>
                    <td>Medicamento</td>
                    <td>Dosis recomendado</td>
                    <td>Acciones</td>
                </thead>
            </table>
            <br>
            <div class="ln_solid"></div>
            
                    
        </div>
        
    </div>
    </div>
</div>
<!--nueva atencion--->
<div class="modal fade bs-example-modal-lg" id="modalnuevo"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form  id="nueva-atencion">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Atencion Medica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="selemedico">Medico<span class="required">*</span></label>
                            <div class="col-md-7 col-sm-7 ">
                                <select class="mi-selector form-control" id="selemedico" name="selemedico">
                                    <option value="0">--seleccione Medico--</option>
                                    @foreach ($med as $med)
                                        <option value="{{$med['med_id']}}">{{$med['med_nombre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="selemascota">Mascota<span class="required">*</span></label>
                            <div class="col-md-7 col-sm-7 ">
                                <select class="mi-selector form-control" id="selemascota" name="selemascota">
                                    <option value="0">--seleccione Mascota--</option>
                                    @foreach ($ani as $ani)
                                        <option value="{{$ani['ani_id']}}">{{$ani['ani_nombre']}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="seleservicio">Servicio<span class="required">*</span></label>
                            <div class="col-md-7 col-sm-7 ">
                            <select class="mi-selector form-control" id="seleservicio" name="seleservicio">
                                <option value="0" disabled>--seleccione Servicio--</option>
                                    @foreach ($serv as $serv)
                                        <option value="{{$serv['ser_id']}}">{{$serv['ser_nombre']}}</option>
                                    @endforeach
                            </select>
                            </div>

                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputAddress2">Diagnostico</label>
                            <div class="col-md-7 col-sm-7 ">
                                <textarea  id="txtdiagnostico" name="txtdiagnostico"  cols="20" rows="6" class="form-control"></textarea>
                                
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnnuevo" name="btnnuevo" class="btn btn-primary">Aceptar</button>
                </div>
            </div>

        </form>

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
                        <select class="mi-selector form-control" id="selenfermedad" name="selenfermedad">
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
                        <select class="mi-selector form-control" id="seleproducto" name="seleproducto">
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
                    <button type="submit" id="btnnuevo1" name="btnnuevo" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </form>

      </div>
</div>
<!--detalles-->
<script>
  $(document).ready(function(){
      var tablaanimal=$('#tabla-detalles').DataTable({
          processing:true,
          //serverSide:true,
          
        });
  });
</script>

<!--registrar nueva Atencion-->
<script>
    $('#nueva-atencion').submit(function(e){
        e.preventDefault();
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
                    $('#nueva-atencion')[0].reset();
                   $('#modalnuevo').modal('hide');
                    
                   nuevaatencion();
                   toastr.success('servicio generado correctamente.','nueva servicio',{timeout:3000});
                    //$('#tabla-venta').DataTable().ajax.reload();
                }
            }
        });
    });
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
                    $('#agregar-detalle')[0].reset();
                    $('#modalnuevodetalle').modal('hide');
                    
                  toastr.success('El registro se ingreso correctamente.','nuevo registro',{timeout:3000});
                    //$('#tabla-detalle_venta').DataTable().ajax.reload();
                    
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
        $('#txtnombre_med').val(atencion[0].med_nombre);
        $('#txtnombre_mas').val(atencion[0].ani_nombre);
        $('#txtservicio').val(atencion[0].ser_nombre);
        $('#txtfecha').val(atencion[0].ate_fecha_hora);
        $("input[name=_token]").val();
        });

    }

    jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
        });
    });
</script>


@endsection