@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
<a href="{{route('integrantes.index')}}" class="btn btn-secondary float-right"><i class="fa-solid fa-arrow-left"></i> Volver</a>
    <h1>Crear Integrante</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{ html()->form('POST', route('integrantes.store'))->open() }}
        
        @include('integrantes.partials.form')
        {{html()->submit('Agregar')->class('btn btn-primary')}}
       
       
    </div>
    </div>
    {{html()->form()->close()}}
@stop

@section('css')
    
@stop

@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
<script>
document.querySelector('.sexo').addEventListener('change', function() {
  
  let sexo = this.value;
  if (sexo == 'Femenino') {
     document.querySelector('.embarazada').style.display = 'block';
  } else {
     document.querySelector('.embarazada').style.display = 'none';
     document.querySelector('#status').checked = false;

  }
});
</script>
@if (session('info'))
<script>  
Swal.fire({
       title: "Error!",
       text: "{{session('info')}}",
      icon: "error"
     });
</script>
@endif
@stop