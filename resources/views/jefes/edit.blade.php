@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
<a href="{{route('jefes.index')}}" class="btn btn-secondary float-right"><i class="fa-solid fa-arrow-left"></i> Volver</a>
    <h1>Editar Jefe</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
{{ html()->modelForm( $jefe,'PUT', route('jefes.update',$jefe))->open() }}

@include('jefes.partials.form')

{{html()->submit('Actualizar')->class('btn btn-primary')}}

{{html()->form()->close()}}
</div>
</div>
@stop

@section('css')

@stop

@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
@stop