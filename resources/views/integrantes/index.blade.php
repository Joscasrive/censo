@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
<a href="{{route('integrantes.create')}}" class="btn btn-primary float-right">Agregar Integrante</a>
    <h1>Lista de Integrantes</h1>
@stop

@section('content')
  @livewire('integrantes-lista')
@stop

@section('css')
    
@stop

@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
<script>
    $('.form').submit(function(e){
        e.preventDefault();
        Swal.fire({
  title: "Estas seguro?",
  text: "Estos cambio sera permanentes",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, Borrar!",
  cancelButtonText: "Cancelar",
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
  }

    })
});

</script>
@if (session('info'))
<script>  
Swal.fire({
       title: "Exito!",
       text: "{{session('info')}}",
      icon: "success"
     });
</script>
@endif
@stop