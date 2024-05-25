<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary float-letf" data-bs-toggle="modal" data-bs-target="#crearBombona">
        <i class="fa-solid fa-plus"></i>  Agregar
      </button>
    </div>
@if ($bombonas->count())
    

    <div class="card-body">
        <div class="table-responsive">
 <table class="table table-striped table-hover table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Tipo</th>
           
            <th width="5px"></th>
          
            
        </tr>
    </thead>
    @foreach ($bombonas as $bombona)
        <tbody wire:key="manzana--{{$bombona->id}}" >
           
            <td>{{$bombona->id}}</td>
            <td>{{$bombona->tipo}}</td>
           
           
           <td class="d-flex justify-content">
            
            <a  wire:click ="edit({{$bombona->id}})" data-bs-toggle="modal" data-bs-target="#editarBombona" class="btn btn-primary m-1"><i class="fa-solid fa-pen-to-square"></i></a>
           
           
                 
           
            <button type="submit" wire:click="$dispatch('deleteBombona',{{$bombona->id}})" class="btn btn-danger m-1"><i class="fa-solid fa-trash"></i></button>
            
            </td>

           
        </tbody>
        @endforeach
       
    
 </table>
</div>
    </div>
    <div class="card-footer">
        {{$bombonas->links()}}
    </div>
    @else

    <div class="card-body"><strong>No hay resultados</strong></div>
   @endif

   {{-- Formulario de Creacion --}}
   <form wire:submit="create()" >
    
  <div wire:ignore.self class="modal fade" id="crearBombona" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarfamiliaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
          
        </div>
        <div class="modal-body">
            
              <div class=" form-group">
                <label for="tipo">Tipo</label>
               <select class="form-control" wire:model="tipo">
                <option value="">Seleccione el tipo de Bombona</option>
                <option value="18kg">18Kg</option>
                <option value="32kg">32Kg</option>
                <option value="42kg">42Kg</option>
               </select>
                @error('tipo')
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

  <div wire:ignore.self class="modal fade" id="editarBombona" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarfamiliaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
          
        </div>
        <div class="modal-body">
            
             
          <div class=" form-group">
            <label for="tipo">Tipo</label>
           <select class="form-control" wire:model="bombonaEdit.tipo">
            <option value="">Seleccione el tipo de Bombona</option>
            <option value="18kg">18Kg</option>
            <option value="32kg">32Kg</option>
            <option value="42kg">42Kg</option>
           </select>
            @error('bombonaEdit.tipo')
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
  Livewire.on('deleteBombona', id=>{
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
