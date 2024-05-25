<div class="card">
    <div class="card-header d-flex justify-start">
     
        
        <a href="{{route('integrantes.create')}}" class="btn btn-primary float-left mr-1"><i class="fa-solid fa-plus"></i></a>
        <a href="{{route('integrantes.export')}}" class="btn btn-success float-left mr-1"><i class="fa-solid fa-file-excel"></i></a>
        <input class="form-control" placeholder="Buscar" wire:model.live="search"/>
    </div>
@if ($integrantes->count())
    

    <div class="card-body">
        <div class="table-responsive">
 <table class="table table-striped table-hover table-sm">
    <thead>
        <tr>
            <th>#NroFamiliar</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>CI</th> 
            <th>Fecha de Nacimiento</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Miembro/Jefe</th>
            
        
            <th width="5px"></th>
          
            
        </tr>
    </thead>
    @foreach ($integrantes as $integrante)
        <tbody>
           
            <td>{{$integrante->familia->nro_familiar}}</td>
            <td>{{$integrante->nombres}}</td>
            <td>{{$integrante->apellidos}}</td>
            <td>{{$integrante->ci}}</td>
            <td>{{$integrante->fecha_nacimiento}}</td>
            <td>{{$integrante->correo}}</td>
            <td>{{$integrante->telefono}}</td>
            <td>{{$integrante->tipo_persona}}</td>
           
           <td class="d-flex justify-content">
            <a  href="{{route('integrantes.show',$integrante)}}" class="btn btn-info m-1"><i class="fa-solid fa-eye"></i></a>
            <a  href="{{route('integrantes.edit',$integrante)}}" class="btn btn-primary m-1"><i class="fa-solid fa-pen-to-square"></i></a>
           
            <form class="form" action="{{route('integrantes.destroy',$integrante)}}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger m-1"><i class="fa-solid fa-trash"></i></button>
            </form>
            </td>

           
        </tbody>
        @endforeach
       
    
 </table>
</div>
    </div>
    <div class="card-footer">
        {{$integrantes->links()}}
    </div>
    @else

    <div class="card-body"><strong>No hay resultados</strong></div>
   @endif
   </div>
