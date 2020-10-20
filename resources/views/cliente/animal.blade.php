@extends('master')

@section('content')
<!----todo codigo html------>
<div class="box-footer">
    <button  onclick="window.location='{{url('cliente/nuevo')}}'" type="button" class="btn btn-primary" name="registrar">ver</button>

</div>

<table class="table table-head-fixed text-nowrap">
    <thead>
    <th>ID</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Propietario</th>
    <th>Acciones</th>
    </thead>
    <tbody>
    @foreach($animales as $animal)
    <tr>
    <td>{{$animal->id}}</td>
    <td>{{$animal->nombre}}</td>
    <td>{{$animal->edad}}</td>
    <td>{{$animal->propietario}}</td>
    <td>
    <form action="{{route('cliente.eliminar',$animal->id)}}" method="post">
    @method('DELETE')
    @csrf
     <input type="submit" value="Eliminar" onclick="return confirm('desea eliminar?')">
    
    </form>
    <a href="{{route('cliente.editar',$animal->id)}}">editar</a>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    
@endsection