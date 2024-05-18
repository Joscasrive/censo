@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
<button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#crearfamilia">
    Crear Manzana
  </button>
    <h1>Lista de Manzanas</h1>
@stop

@section('content')
  
   

  <!-- Modal -->
  
  <div class="modal fade" id="crearfamilia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
          
        </div>
        <div class="modal-body">
           
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>
  
  
@stop



@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@stack('js')

@stop
