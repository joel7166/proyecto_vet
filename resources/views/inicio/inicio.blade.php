@extends('master')

@section('content')
<!----todo codigo html------>
<h1 >Somos una clínica veterinaria
     multidisciplinaria que ofrece diferentes especialidades .</h1>
<div class="row">
    <div class="col-md-8 col-sm-8 ">

<a><img  style="border: 5px solid; color: rgb(23, 24, 26);" src="https://m.eltiempo.com/files/image_640_428/uploads/2018/08/22/5b7d6b71cf609.png" alt=""></a>
</div>
<div class="col-md-4 col-sm-4 ">
    <a> <img  style="border: 5px solid; color: rgb(18, 20, 20);" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTocZo9EMFLnggGrtanf8YEZqbRyXX5xYX6Lg&usqp=CAU" alt=""></a>
    <br/>
    <br/>
    <a> <img  style="border: 5px solid; color: rgb(51, 72, 138);" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQNtxj8PUZH81_htfbowSspa_NzEy_P-4fylQ&usqp=CAU" alt=""></a>
</div>

</div>
<br/>
<div class="row">
    <div class="col-md-12 col-sm-12 ">

         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a  type="button" href="{{route('mascota.index')}}" class="btn btn-info circle "><img src="https://img.icons8.com/fluent/96/000000/cat-footprint.png"/></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a type="button"  class="btn btn-info" href="{{route('ventas.venta')}}"><img src="https://img.icons8.com/plasticine/100/000000/clear-shopping-cart.png"/></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-success"><img src="https://img.icons8.com/plasticine/96/000000/phone-not-being-used.png"/></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-danger"><img src="https://img.icons8.com/plasticine/100/000000/stethoscope.png"/></button>

    </div>

  </div>

@endsection
