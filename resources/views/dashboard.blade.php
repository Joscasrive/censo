@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
  <h1></h1>
  
    
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
    
    <div id="map" ></div>
@stop

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            display: flex;
  justify-content: center;
  align-items: center;
  height: 80vh;
  width: 80vw;
}
    </style>
@stop

@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
   const map = L.map('map').setView([9.921579, -69.627259],13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
      subdomains: ['a', 'b', 'c']
    }).addTo(map);


    // Agregar marcador con icono
    const marker = L.marker([9.921579, -69.627259], {
      icon: L.icon({
        iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41]
      })
    }).addTo(map);
  </script>
@stop
