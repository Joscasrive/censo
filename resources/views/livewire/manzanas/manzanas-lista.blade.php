<div class="card">
    <div class="card-header">
        <input class="form-control" placeholder="Buscar" wire:model.live="search"/>
    </div>
@if ($manzanas->count())
    

    <div class="card-body">
        <div class="table-responsive">
 <table class="table table-striped table-hover table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Ubicacion</th>
            <th>Responsable</th>
            <th width="5px"></th>
          
            
        </tr>
    </thead>
    @foreach ($manzanas as $manzana)
        <tbody wire:key="manzana--{{$manzana->id}}" >
           
            <td>{{$manzana->id}}</td>
            <td>{{$manzana->nombre}}</td>
            <td>{{$manzana->ubicacion}}</td>
            <td>{{$manzana->clap->nombre}}</td>
           
           <td class="d-flex justify-content">
            
            <a  wire:click ="edit({{$manzana->id}})" data-bs-toggle="modal" data-bs-target="#editarManzana" class="btn btn-primary m-1"><i class="fa-solid fa-pen-to-square"></i></a>
           
           
                 
           
                <button type="submit" wire:click="$dispatch('deleteManzana',{{$manzana->id}})" class="btn btn-danger m-1"><i class="fa-solid fa-trash"></i></button>
            
            </td>

           
        </tbody>
        @endforeach
       
    
 </table>
</div>
    </div>
    <div class="card-footer">
        {{$manzanas->links()}}
    </div>
    @else

    <div class="card-body"><strong>No hay resultados</strong></div>
   @endif

   {{-- Formulario de Creacion --}}
   <form wire:submit="create()" >
    
  <div wire:ignore.self class="modal fade" id="crearManzana" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarfamiliaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
          
        </div>
        <div class="modal-body">
            
              <div class=" form-group">
                <label for="nombre">Nombre</label>
               <input type="text" placeholder="Ingrese el nombre" class="form-control"  wire:model="nombre" required>
                @error('nombre')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class=" form-group">
                <label for="ubicacion">Ubicacion</label>
               <input type="text" placeholder="Ingrese la ubicacion o sector" class="form-control"  wire:model="ubicacion" required>
                @error('ubicacion')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class=" form-group">
                <label for="ubicacion">Manzanero</label>
               <select  class="form-control" wire:model="clap_id">
                <option value="">Seleccion una Manzanero</option>
               @foreach ($responsables as $responsable)
                   <option value="{{$responsable->id}}">{{$responsable->nombre}}</option>
               @endforeach
               </select>
                @error('clap_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger agregar" data-bs-dismiss="modal" wire:click="closeModal">Cancelar</button>
          <button type="submit" class="btn btn-primary" >Agregar</button>
        </div>
      </div>
    </div>
  </div>
  
    </form>
    {{-- Formulario de Actualizacion --}}
   <form wire:submit="update()">

  <div wire:ignore.self class="modal fade" id="editarManzana" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarfamiliaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
          
        </div>
        <div class="modal-body">
            
              <div class=" form-group">
                <label for="nombre">Nombre</label>
               <input type="text" placeholder="Ingrese el nombre" class="form-control"  wire:model.live="manzanaEdit.nombre" required>
                @error('manzanaEdit.nombre')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class=" form-group">
                <label for="ubicacion">Ubicacion</label>
               <input type="text" placeholder="Ingrese la ubicacion o sector" class="form-control"  wire:model.live="manzanaEdit.ubicacion" required>
                @error('manzanaEdit.ubicacion')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class=" form-group">
                <label for="ubicacion">Manzanero</label>
               <select  class="form-control" wire:model="manzanaEdit.clap_id">
                <option value="">Seleccion una Manzanero</option>
               @foreach ($responsables as $responsable)
                   <option value="{{$responsable->id}}">{{$responsable->nombre}}</option>
               @endforeach
               </select>
                @error('manzanaEdit.clap_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            
           
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger agregar actualizar" data-bs-dismiss="modal" wire:click="closeModal">Cancelar</button>
          <button type="submit" class="btn btn-primary" >Actualizar</button>
        </div>
      </div>
    </div>
  </div>
  
    </form>
    @push('js')
    <script>
  Livewire.on('deleteManzana', id=>{
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
      document.querySelector('.actualizar').click();
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