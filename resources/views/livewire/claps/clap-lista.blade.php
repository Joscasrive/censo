
<div class="card">
    <div class="card-header d-flex justify-start">
      <button type="button" class="btn btn-primary float-right mr-1" data-bs-toggle="modal" data-bs-target="#crearMiembro">
        <i class="fa-solid fa-plus"></i>
      </button>
      <a href="{{route('claps.export')}}" class="btn btn-success float-left mr-1"><i class="fa-solid fa-file-excel"></i></a>
        <input class="form-control" placeholder="Buscar" wire:model.live="search"/>
        
    </div>
@if ( $claps->count())
    

    <div class="card-body">
        <div class="table-responsive">
 <table class="table table-striped table-hover table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Resposabilidad</th>
            <th>Img</th>
            <th width="5px"></th>
            
        </tr>
    </thead>
    @foreach ($claps as $clap)
        <tbody wire:key="clap--{{$clap->id}}">
           
            <td>{{$clap->id}}</td>
            <td>{{$clap->ci}}</td>
            <td>{{$clap->nombre}}</td>
            <td>{{$clap->apellido}}</td>
            <td>{{$clap->telefono}}</td>
            <td>{{$clap->correo}}</td>
            <td>{{$clap->responsabilidad}}</td>
            @if ($clap->img)
            <td><img src="{{Storage::url($clap->img)}}" style="border-radius: 50%; width: 50px; height: 50px;" ></td>
            @else
            <td><img src="{{asset('storage/claps/defaul.jpg')}}"style="border-radius: 50%; width: 50px; height: 50px;"></td> 
            
            @endif
           
           
            <td class="d-flex justify-content">
           
           <button wire:click="edit({{$clap->id}})" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#editarMiembro"><i class="fa-solid fa-pen-to-square"></i></button>
            
               
                   
            <button wire:click="$dispatch('deleteClap',{{$clap->id}})"  class="btn btn-danger  m-1"><i class="fa-solid fa-trash"></i></button>
           
        </td>
           
        </tbody>
        @endforeach
       
    
 </table>
</div>
    </div>
    <div class="card-footer">
        {{$claps->links()}}
    </div>
    @else

    <div class="card-body"><strong>No hay resultados</strong></div>
   @endif
   {{-- Formulario de Creacion --}}
   <form  wire:submit="create()"  enctype="multipart/form-data">
 
  <div wire:ignore.self class="modal fade" id="crearMiembro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarfamiliaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
          
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" placeholder="ingrese el nombre" class="form-control"  wire:model="nombre" required>
                    @error('nombre')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" placeholder="ingrese el apellido" class="form-control"  wire:model="apellido" required>
                    @error('apellido')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
           <div class="row">
                <div class="col form-group">
                    <label for="ci">Cedula</label>
                    <input type="text" class="form-control" wire:model="ci"  placeholder="Ingrese la cedula" required>
                    @error('ci')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" wire:model="telefono"  placeholder="Ingrese su numero de telefono" required>
                    @error('telefono')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
           </div>
           
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" placeholder="ingrese el correo" class="form-control"  wire:model="correo" required>
                @error('correo')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="row">
              <div class="col form-group">
                <label for="resposabilidad">Resposabilidad</label>
               <select class="form-control"  wire:model="responsabilidad" required>
                <option value="">Seleccione Resposabilidad</option>
                <option value="UBCH">UBCH</option>
                <option value="FFM">FFM</option>
                <option value="UNAMUJER">UNAMUJER</option>
                <option value="ALIMENTACION">ALIMENTACION</option>
                <option value="COMUNICADOR">COMUNICADOR</option>
                <option value="PRODUCTIVO">PRODUCTIVO</option>
                <option value="MANZANERO">MANZANERO</option>
               </select>
                @error('responsabilidad')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="col form-group">
                <label for="img">Imagen</label>
                <input type="file"  id="imgInput" class="form-control" name="img" wire:model="img" accept="image/jpeg,image/png,image/jpg" >
                @error('img')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            
            </div>
            @isset($img)
            <div class="d-flex justify-content-center">
              <img src="{{$img->temporaryUrl()}}" alt="Imagen seleccionada" id="img" style="border-radius: 50%; width: 100px; height: 100px;">
            </div>
            @endisset
            <div  class="d-flex justify-content-center align-items-center" >
              <div wire:loading  wire:target="img"  class="spinner-border" role="status">
                  <span class="sr-only">Procesando...</span>
              </div>
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
<form wire:submit="update()"  enctype="multipart/form-data">
  
<div wire:ignore.self class="modal fade" id="editarMiembro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarfamiliaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingrese los Datos</h1>
        
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col form-group">
              <label for="nombre">Nombre</label>
             <input type="text" placeholder="ingrese el nombre" class="form-control"  wire:model="clapEdit.nombre" required>
              @error('clapEdit.nombre')
              <small class="text-danger">{{$message}}</small>
              @enderror
          </div>
          <div class="col form-group">
              <label for="apellido">Apellido</label>
             <input type="text" placeholder="ingrese el apellido" class="form-control"  wire:model="clapEdit.apellido" required>
              @error('clapEdit.apellido')
              <small class="text-danger">{{$message}}</small>
              @enderror
          </div>
          </div>
         <div class="row">
          <div class="col form-group">
            <label for="ci">Cedula</label>
            <input type="text" class="form-control" wire:model="clapEdit.ci"  placeholder="Ingrese la cedula" required>
            @error('clapEdit.ci')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="col form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" wire:model="clapEdit.telefono"  placeholder="Ingrese su numero de telefono" required>
            @error('clapEdit.telefono')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
         </div>
         
          <div class="form-group">
              <label for="correo">Correo</label>
              <input type="email" placeholder="ingrese el correo" class="form-control" wire:model="clapEdit.correo" required>
              @error('clapEdit.correo')
              <small class="text-danger">{{$message}}</small>
              @enderror
          </div>
          <div class="row">
            <div class="col form-group">
              <label for="resposabilidad">Responsabilidad</label>
             <select class="form-control"  wire:model="clapEdit.responsabilidad" required>
              <option value="">Seleccione Responsabilidad</option>
              <option value="UBCH">UBCH</option>
              <option value="FFM">FFM</option>
              <option value="UNAMUJER">UNAMUJER</option>
              <option value="ALIMENTACION">ALIMENTACION</option>
              <option value="COMUNICADOR">COMUNICADOR</option>
              <option value="PRODUCTIVO">PRODUCTIVO</option>
              <option value="MANZANERO">MANZANERO</option>
             </select>
              @error('clapEdit.responsabilidad')
              <small class="text-danger">{{$message}}</small>
              @enderror
          </div>
          <div class="col form-group">
              <label for="img">Imagen</label>
              <input type="file"  id="imgInput" class="form-control"  wire:model="clapEdit.img" accept="image/jpeg,image/png,image/jpg" >
              @error('clapEdit.img')
              <small class="text-danger">{{$message}}</small>
              @enderror
          </div>
          
          </div>
         
          @isset($clapEdit->imgActual)
          <div class="d-flex justify-content-center">
            <img src="@if($clapEdit->img) {{$clapEdit->img->temporaryUrl()}} @else {{Storage::url($clapEdit->imgActual)}} @endif" id="img" style="border-radius: 50%; width: 100px; height: 100px;">
          </div>
          @endisset
        
          <div  class="d-flex justify-content-center align-items-center" >
            <div wire:loading  wire:target="clapEdit.img"  class="spinner-border" role="status">
                <span class="sr-only">Procesando...</span>
            </div>
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
Livewire.on('deleteClap', id=>{
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
      ' Dato Eliminado',
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
  
      Swal.fire({
    title: "Error!",
    text: mensaje,
    icon: "error"
  });
})
 
    document.getElementById('imgInput').addEventListener('change', function() {
        var file = this.files[0];
        var fileType = file.type;
        var validTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        if (!validTypes.includes(fileType)) {
            alert('El formato de la imagen no es válido. Solo se permiten JPG, JPEG y PNG.');
            this.value = '';
            return;
        }
    });

  
  </script>
  @endpush
    
    
 </div>
   