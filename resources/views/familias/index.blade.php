@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
@can('modificacion')
<button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#crearfamilia">
  Agregar Familia
</button>
@endcan

    <h1>Lista de Jefes</h1>
@stop

@section('content')
   @livewire('familias-lista')
   
@stop



@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@stack('js')

@stop
