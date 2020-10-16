@extends('master')

@section('content')
<!----todo codigo html------>
  <<div class="box-body">
        <div class="col-md-6">  
                <form action="{{route('cliente.actualizar',$animal->id)}}" method="POST">
                 @csrf
                 @method ('PUT')
                   <div class="form-group">
                     <label for="exampleInputNombre">Propietario</label>
                     <input type="text" class="form-control" id="exampleInputNombre" placeholder="" name="propietario" value="{{$animal->propietario}}">
                     </div>

                     <div class="form-group">
                     <label for="exampleInputNombre">Nombre Animal</label>
                     <input type="text" class="form-control" id="exampleInputNombre" placeholder="" name="nombre" value="{{$animal->nombre}}">
                     </div>

                     <div class="form-group">
                     <label>Especie</label>
                     <select class="form-control select2" style="width: 100%;" name="especie" id="">

                     <option values="perro" {{$animal->especie=='perro' ? 'selected' :''}}>PERRO</option>
                     <option  values="elefante" {{$animal->especie=='elefante' ? 'selected' :''}}>ELEFANTE</option>
                     <option  values="gato" {{$animal->especie=='gato' ? 'selected' :''}}>GATO</option>
        
                     </select>
                     </div>

                     <div class="form-group">
                     <label for="exampleInputRaza">Raza</label>
                     <input type="text" class="form-control" id="exampleInputRaza" placeholder="" name="raza" value="{{$animal->raza}}">
                     </div>
                

                  
                    <div class="form-group">
                     <label for="exampleInputColor">Color</label>
                     <input type="text" class="form-control" id="exampleInputColor" placeholder="" name="color" value="{{$animal->color}}">
                     </div>

                   
                      <div class="form-group">
                      <label for="">GENERO</label>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="rbgenero" value="1" {{$animal->rbgenero=='1' ? 'checked' :''}}>
                          <label for="customRadio1" class="custom-control-label"> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Macho</font></font></label>
                        </div>
                       
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="rbgenero" value="0"  {{$animal->rbgenero=='0' ? 'checked' :''}}>
                          <label for="customRadio2" class="custom-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hembra</font></font></label>
                        </div>
                        </div>


                        <label>FECHA NACIMIENTO</label>
                     <div class="form-group">
                     
                     <div class="input-group">
                     
                     <div class="input-group-addon">
                     
                    <i class="fa fa-calendar"></i>
                     </div>
                     
                    <input type="date" class="form-control" data-inputmask="'alias': ''" data-mask="" name="fecha_nacimiento"  value="{{$animal->fecha_nacimiento}}">
                   </div>
                   </div>

              <!-- <div class="box-footer"> --> 
                <button  onclick="window.location='{{url('cliente/animal')}}'" type="button" class="btn btn-primary" name="registrar">Listar Animal</button>
                   <!---  </div> --->
                     <div class="col-sm-6">
                    
                     <button type="submit" class="btn btn-primary" name="actualizar">actualizar</button>
                     
                     </div>
             </form>
             </div>
     </div> 
                       

                  



@endsection