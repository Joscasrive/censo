@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Lista De Usuarios</h1>
@stop

@section('content')
    @livewire('users-index')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
@stop