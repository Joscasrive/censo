<div >

 <!-- Modal -->
 <div   wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Consejo Comunal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @if(isset($datos)) wire:submit="update()" @else wire:submit="save()" @endif>
          <div class="form-group">
              <label for="nombre" class="col-form-label">Codigo</label>
              <input type="text"  class="form-control" wire:model="codigo">
            </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="nombre" class="col-form-label">Nombre</label>
              <input type="text" id="nombre" class="form-control" wire:model="nombre">
            </div>
            <div class="col-md-6">
              <label for="municipio" class="col-form-label">Municipio</label>
              <input type="text" id="municipio" class="form-control" wire:model="municipio">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="parroquia" class="col-form-label">Parroquia</label>
              <input type="text" id="parroquia" class="form-control" wire:model="parroquia">
            </div>
            <div class="col-md-6">
              <label for="rif" class="col-form-label">RIF</label>
              <input type="text" id="rif" class="form-control" wire:model="rif">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="clap" class="col-form-label">CLAP</label>
              <input type="text" id="clap" class="form-control" wire:model="clap">
            </div>
            <div class="col-md-6">
              <label for="correo" class="col-form-label">Correo</label>
              <input type="email" id="correo" class="form-control" wire:model="correo">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="misiones" class="col-form-label">Misiones</label>
              <input type="text" id="misiones" class="form-control" wire:model="misiones">
            </div>
            <div class="col-md-6">
              <label for="centro" class="col-form-label">Centro Comunal</label>
              <input type="text" id="centro" class="form-control" wire:model="centro">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="norte" class="col-form-label">Comunidad Norte</label>
              <input type="text" id="norte" class="form-control" wire:model="norte">
            </div>
            <div class="col-md-6">
              <label for="sur" class="col-form-label">Comunidad Sur</label>
              <input type="text" id="sur" class="form-control" wire:model="sur">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="este" class="col-form-label">Comunidad Este</label>
              <input type="text" id="este" class="form-control" wire:model="este">
            </div>
            <div class="col-md-6">
              <label for="oeste" class="col-form-label">Comunidad Oeste</label>
              <input type="text" id="oeste" class="form-control" wire:model="oeste">
            </div>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger agregar" data-dismiss="modal">Cerrar</button>
        @if (isset($datos))
           
        <button type="submit" class="btn btn-primary agregar" >Actualizar</button>
      
            @else
            <button type="submit" class="btn btn-primary agregar" >Guardar</button>
            
        @endif
        
      </div>
  </form>
    </div>
  </div>
</div>
 
@if(!isset($datos))

@can('modificacion')
<button type="button" class="btn btn-primary  float-right" data-toggle="modal" data-target="#exampleModal">
  Agregar Datos
 </button>
@endcan

      
  @else
      
  
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informacion Consejo Comunal</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" class="form-control" value="{{ $datos->nombre }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                <input type="text" id="municipio" class="form-control" value="{{$datos->municipio }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parroquia">Parroquia</label>
                                <input type="text" id="parroquia" class="form-control" value="{{$datos->parroquia  }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="rif">RIF</label>
                                <input type="text" id="rif" class="form-control" value="{{$datos->rif  }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clap">CLAP</label>
                                <input type="text" id="clap" class="form-control" value="{{$datos->clap  }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" id="correo" class="form-control" value="{{ $datos->correo }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="misiones">Misiones</label>
                                <input type="text" id="misiones" class="form-control" value="{{ $datos->misiones }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="centro">Centro Comunal</label>
                                <input type="text" id="centro" class="form-control" value="{{ $datos->centro }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="norte">Comunidad Norte</label>
                                <input type="text" id="norte" class="form-control" value="{{ $datos->norte }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="sur">Comunidad Sur</label>
                                <input type="text" id="sur" class="form-control" value="{{ $datos->sur }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="este">Comunidad Este</label>
                                <input type="text" id="este" class="form-control" value="{{ $datos->este }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="oeste">Comunidad Oeste</label>
                                <input type="text" id="oeste" class="form-control" value="{{ $datos->oeste }}" disabled>
                            </div>
                           
                        </div>
                        @can('modificacion')
                            
                        
                        <div class="form-group">
                          <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</a>
                          <button class="btn btn-danger" wire:click="$dispatch('deleteDato',{{$datos->id}})">Eliminar</button>
                        </div>
                        @endcan
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
  @push('js')
  <script>
Livewire.on('deleteDato', id=>{
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
    Livewire.dispatch('delete',{ id });
    swal.fire(
      'Borrado!',
      'Dato  eliminado',
      'success'
    )
   
  }
  
    })
  });
  Livewire.on('alert',function(mensaje){
    
    document.querySelector('.agregar').click();

      Swal.fire({
    title: "Exito!",
    text: mensaje,
    icon: "success"
  });
 })
 
  
  </script>
  @endpush
</div>
