@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{$familias}}</h3>
    <p>Familias</p>
    </div>
    <div class="icon">
        <i class="fa-solid fa-people-roof"></i>
    </div>
    <a href="{{route('familias.index')}}" class="small-box-footer">Mas Informacion <i class="fa-solid fa-circle-info"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-success">
    <div class="inner">
    <h3>{{$integrates}}</h3>
    <p>Integrantes</p>
    </div>
    <div class="icon">
        <i class="fa-solid fa-users"></i>
    </div>
    <a href="{{route('integrantes.index')}}"" class="small-box-footer">Mas Infromacion <i class="fa-solid fa-circle-info"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-primary">
    <div class="inner">
    <h3>{{$responsables}}</h3>
    <p>Responsables</p>
    </div>
    <div class="icon">
        <i class="fa-solid fa-users-gear"></i>
    </div>
    <a  href="{{route('claps.index')}}" class="small-box-footer">Mas Informacion <i class="fa-solid fa-circle-info"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-danger">
    <div class="inner">
    <h3>{{$jefes}}</h3>
    <p>Jefes de Familia</p>
    </div>
    <div class="icon">
    <i class="fa-solid fa-user-tie"></i>
    </div>
    <a  href="{{route('jefes.index')}}" class="small-box-footer">Mas Informacion <i class="fa-solid fa-circle-info"></i></a>
    </div>
    </div>
    
    </div>
    
    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
@stop
