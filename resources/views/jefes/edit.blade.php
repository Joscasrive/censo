@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
<a href="{{route('jefes.index')}}" class="btn btn-secondary float-right"><i class="fa-solid fa-arrow-left"></i> Volver</a>
    <h1>Editar Jefe</h1>
@stop

@section('content')
{{ html()->modelForm( $jefe,'PUT', route('jefes.update',$jefe))->open() }}
<div class="card">
    <div class="card-body">


@include('jefes.partials.form')

{{html()->submit('Actualizar')->class('btn btn-primary')}}


</div>
</div>
{{html()->form()->close()}}
@stop

@section('css')

@stop

@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
@stop