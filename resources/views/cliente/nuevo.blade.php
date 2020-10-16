@extends('master')

@section('content')
<!----todo codigo html------>
  <<div class="box-body">
        <div class="col-md-6">  
                <form action="{{route('cliente.registrar')}}" method="POST">
                 @csrf
                   <div class="form-group">
                     <label for="exampleInputNombre">Propietario</label>
                     <input type="text" class="form-control" id="exampleInputNombre" placeholder="" name="propietario">
                     </div>

                     <div class="form-group">
                     <label for="exampleInputNombre">Nombre Animal</label>
                     <input type="text" class="form-control" id="exampleInputNombre" placeholder="" name="nombre">
                     </div>

                     <div class="form-group">
                     <label>Especie</label>
                     <select class="form-control select2" style="width: 100%;" name="especie">
                     <option selected="selected">Seleccionar Especie</option>
                     <option>PERRO</option>
                     <option>ELEFANTE</option>
                     <option>GATO</option>
        
                     </select>
                     </div>

                     <div class="form-group">
                     <label for="exampleInputRaza">Raza</label>
                     <input type="text" class="form-control" id="exampleInputRaza" placeholder="" name="raza">
                     </div>
                

                  
                    <div class="form-group">
                     <label for="exampleInputColor">Color</label>
                     <input type="text" class="form-control" id="exampleInputColor" placeholder="" name="color">
                     </div>

                   
                      <div class="form-group">
                      <label for="">GENERO</label>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="rbgenero" value="1">
                          <label for="customRadio1" class="custom-control-label"> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Macho</font></font></label>
                        </div>
                       
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="rbgenero" value="0">
                          <label for="customRadio2" class="custom-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hembra</font></font></label>
                        </div>
                        </div>
                       

                   <label>FECHA NACIMIENTO</label>
                     <div class="form-group">
                     
                     <div class="input-group">
                     
                     <div class="input-group-addon">
                     
                    <i class="fa fa-calendar"></i>
                     </div>
                     
                    <input type="date" class="form-control" data-inputmask="'alias': ''" data-mask="" name="fecha_nacimiento">
                   </div>
                   </div>

              <!-- <div class="box-footer"> --> 
                <button  onclick="window.location='{{url('cliente/animal')}}'" type="button" class="btn btn-primary" name="registrar">Listar Animal</button>
                   <!---  </div> --->
                     <div class="col-sm-6">
                    
                     <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
                     
                     </div>
             </form>
             </div>
     </div> 



@endsection