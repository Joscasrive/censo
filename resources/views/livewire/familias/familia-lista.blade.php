<div class="card">
    <div class="card-header">
       
        <input class="form-control" placeholder="Buscar" wire:model.live="search"/>
        
    </div>
@if ( $familias->count())
    

    <div class="card-body">
        <div class="table-responsive">
 <table class="table table-striped table-hover table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nro Familiar</th>
            <th>Cod.GasLara</th>
            <th>Tipo de Bombona</th>
            <th>Manzana</th>
            <th>Jefe</th>
            <th>Mercado</th>
            <th width="5px"></th>
            
        </tr>
    </thead>
    @foreach ($familias as $familia)
        <tbody wire:key="familia--{{$familia->id}}">
           
            <td>{{$familia->id}}</td>
            <td>{{$familia->nro_familiar}}</td>
            <td>{{$familia->codigo_gas}}</td>
            <td>
              @foreach($familia->bombonas->pluck('tipo') as $tipo)
              ({{$tipo}})
              @endforeach
             
            </td>
            <td>{{$familia->manzana->nombre}}</td>
            <td>{{$familia->boss->nombres}}</td>
            <td>{{$familia->boss->mercado}}</td>
           
            <td class="d-flex justify-content">
           
           <button wire:click="edit({{$familia->id}})" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#editarfamilia"><i class="fa-solid fa-pen-to-square"></i></button>
            
               
                   
            <button wire:click="$dispatch('deleteFamilia',{{$familia->id}})"  class="btn btn-danger  m-1"><i class="fa-solid fa-trash"></i></button>
           
        </td>
           
        </tbody>
        @endforeach
       
    
 </table>
</div>
    </div>
    <div class="card-footer">
        {{$familias->links()}}
    </div>
    @else

    <div class="card-body"><strong>No hay resultados</strong></div>
   @endif
   {{-- Formulario de Creacion --}}
   <form wire:submit="create()">

  <div wire:ignore.self class="modal fade" id="crearfamilia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarfamiliaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
          
        </div>
        <div class="modal-body">
            
            <div class="form-group">
                <label for="nro_familiar">Nro familiar</label>
               <input type="text" placeholder="ingrese el nro familiar" class="form-control"  wire:model="nro_familiar">
                @error('nro_familiar')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="codigo_gas">Gas Lara</label>
               <input type="text" placeholder="ingrese el Codigo de GasLara" class="form-control"  wire:model="codigo_gas">
                @error('codigo_gas')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
            <select  class="form-control"  wire:model="bombona">
              <option value="" selected>Seleccione un Tipo de Bombona</option>
                @foreach ($bombonas as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
            @error('bombona')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
            <div class="form-group">
                <label for="boss_id">Jefe de Familia</label>
                <input type="text" placeholder="Ingrese la cedula del jefe de familia" class="form-control" wire:model="boss_id">
                @error('boss_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="manzana_id">Manzana</label>
                
                <select  class="form-control"  wire:model="manzana_id">
                  <option value="" selected>Selecciones una Manzana</option>
                    @foreach ($manzanas as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                @error('manzana_id')
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
  
{{-- Formulario de edicion --}}
   <form wire:submit="update()">
  
  <div wire:ignore.self class="modal fade" id="editarfamilia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarfamiliaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
          
        </div>
        <div class="modal-body">
            
            <div class="form-group">
                <label for="nro_familiar">Nro familiar</label>
               <input type="text" placeholder="ingrese el nro familiar" class="form-control"  wire:model="familiaEdit.nro_familiar">
                @error('familiaEdit.nro_familiar')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="codigo_gas">Gas Lara</label>
               <input type="text" placeholder="ingrese el Codigo de GasLara" class="form-control" wire:model="familiaEdit.codigo_gas">
                @error('familiaEdit.codigo_gas')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
              <select  class="form-control"  wire:model="familiaEdit.bombona">
                <option value="" selected>Seleccione un Tipo de Bombona</option>
                  @foreach ($bombonas as $key => $value)
                      <option value="{{$key}}">{{$value}}</option>
                  @endforeach
              </select>
              @error('familiaEdit.bombona')
              <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
                <label for="boss_id">Cedula Jefe Familiar</label>
                <input type="text" placeholder="Ingrese la cedula del jefe de familia" class="form-control" wire:model="familiaEdit.boss_id">
                @error('familiaEdit.boss_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="manzana_id">Manzana</label>
                <select  class="form-control"  wire:model="familiaEdit.manzana_id">
                    @foreach ($manzanas as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                @error('familiaEdit.manzana_id')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger actualizar" data-bs-dismiss="modal" wire:click="closeModal">Cancelar</button>
          <button type="submit" class="btn btn-primary" >Actualizar</button>
        </div>
      </div>
    </div>
  </div>
  
    </form>
  
    
  @push('js')
  <script>
Livewire.on('deleteFamilia', id=>{
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
 
 Livewire.on('alerta',function(mensaje){
    document.querySelector('.actualizar').click();
    document.querySelector('.agregar').click();

      Swal.fire({
    title: "Error!",
    text: mensaje,
    icon: "error"
  });
})
  
  </script>
  @endpush
    
    
 </div>
   