@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
    <div></div>
@stop

@section('content')

@livewire('datos')

@stop

@section('css')
@stack('cs')
 <style>
    .bg {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-color: #f0f0f0; /* change to your desired background color */
}

.no-results {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  color: #333;
  font-size: 24px;
  font-weight: bold;
}
 </style>
@stop

@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
@stop
