@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
<a href="{{route('integrantes.index')}}" class="btn btn-secondary float-right"><i class="fa-solid fa-arrow-left"></i> Volver</a>
@stop

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Información del Jefe -->
        <h2>{{ $integrante->nombres }} {{ $integrante->apellidos }}</h2>
        
     
  
      
        <h5>Información </h5>
        <ul class="list-group">
            <li class="list-group-item">Nombres: {{ $integrante->nombres }}</li>
            <li class="list-group-item">Apellidos: {{ $integrante->apellidos }}</li>
            <li class="list-group-item">Cedula: {{ $integrante->ci }}</li>
            <li class="list-group-item">Fecha de Nacimiento: {{ $integrante->fecha_nacimiento }}</li>
            <li class="list-group-item">Edad: {{ $edad }} @if($edad <= 1) Año @else Años @endif</li>
            <li class="list-group-item">Correo: {{ $integrante->correo }}</li>
            <li class="list-group-item">Teléfono: {{ $integrante->telefono }}</li>
            <li class="list-group-item">Codigo: {{ $integrante->codigo }}</li>
            <li class="list-group-item">Serial: {{ $integrante->serial }}</li>
            <li class="list-group-item">Sexo: {{ $integrante->sexo }}</li>
            @if ($integrante->status ==2)
            <li class="list-group-item">Estado: Embarazada</li>
            @endif
            <li class="list-group-item">Grupo Familiar: {{ $integrante->familia->nro_familiar }}</li>
            <li class="list-group-item">Nro de Integrantes: {{ $total }}</li>
            <li class="list-group-item">Observacion: <textarea readonly style="width: 100%; height: 100px;">{{ $integrante->observacion }}</textarea></li>
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