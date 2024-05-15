@extends('adminlte::page')

@section('title', 'SistemaCF')

@section('content_header')
<button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#crearfamilia">
    Crear Familia
  </button>
    <h1>Lista de Jefes</h1>
@stop

@section('content')
   @livewire('familia-lista',['jefes'=>$jefes,'manzanas'=>$manzanas])
   
  
  <!-- Modal -->
  {{html()->form('POST',route('familias.store'))->open()}}
  <div class="modal fade" id="crearfamilia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
          
        </div>
        <div class="modal-body">
            <div class="form-group">
                {{html()->label('NroFamiliar','nro_familiar')}}
                {{html()->text('nro_familiar')->class('form-control')->placeholder('Ingrese el nro de familia')->autocomplete(false)->required()}}
                @error('nro_familiar')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {{html()->label('Codigo Gas Lara','codigo_gas')}}
                {{html()->text('codigo_gas')->class('form-control')->placeholder('Ingrese el Codigo')->autocomplete(false)->required()}}
                @error('codigo_gas')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {{html()->label('Jeje de Familia','boss_id')}}
                {{html()->select('boss_id', $jefes)->class('form-control')->placeholder('Seleccione el Jefe Familiar')->required()}}
                @error('boss_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {{html()->label('Manzana','manzana_id')}}
                {{html()->select('manzana_id', $manzanas)->class('form-control')->placeholder('Seleccione la manzana')->required()}}
                @error('manzana_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear</button>
        </div>
      </div>
    </div>
  </div>
  {{html()->form()->close()}}
  
@stop



@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
@stack('js')

@stop
