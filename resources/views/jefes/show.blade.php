@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
<a href="{{route('jefes.index')}}" class="btn btn-secondary float-right"><i class="fa-solid fa-arrow-left"></i> Volver</a>
@stop

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Información del Jefe -->
        <h2>{{ $jefe->nombres }} {{ $jefe->apellidos }}</h2>
        
     
  
      
        <h5>Información </h5>
        <ul class="list-group">
            <li class="list-group-item">Nombres: {{ $jefe->nombres }}</li>
            <li class="list-group-item">Apellidos: {{ $jefe->apellidos }}</li>
            <li class="list-group-item">Cedula: {{ $jefe->ci }}</li>
            <li class="list-group-item">Edad: {{ $jefe->edad }}</li>
            <li class="list-group-item">Correo: {{ $jefe->correo }}</li>
            <li class="list-group-item">Teléfono: {{ $jefe->telefono }}</li>
            <li class="list-group-item">Codigo: {{ $jefe->codigo }}</li>
            <li class="list-group-item">Serial: {{ $jefe->serial }}</li>
            <li class="list-group-item">Sexo: {{ $jefe->sexo }}</li>
            <li class="list-group-item">Mercado: {{ $jefe->mercado }}</li>
        </ul>
  
      </div>
    </div>
  </div>
@stop

@section('css')

<style>
h2{
    text-align: center;
}
</style>


@stop

@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
@stop