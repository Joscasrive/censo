
   <div class="card">
    <div class="card-header">
        <input class="form-control" placeholder="Buscar" wire:model.live="search"/>
    </div>
@if ($jefes->count())
    

    <div class="card-body">
        <div class="table-responsive">
 <table class="table table-striped table-hover table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>CI</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th width="5px"></th>
          
            
        </tr>
    </thead>
    @foreach ($jefes as $jefe)
        <tbody>
           
            <td>{{$jefe->id}}</td>
            <td>{{$jefe->nombres}}</td>
            <td>{{$jefe->apellidos}}</td>
            <td>{{$jefe->ci}}</td>
            <td>{{$jefe->correo}}</td>
            <td>{{$jefe->telefono}}</td>
           
           <td class="d-flex justify-content">
            <a  href="{{route('jefes.show',$jefe)}}" class="btn btn-info m-1"><i class="fa-solid fa-eye"></i></a>
            <a  href="{{route('jefes.edit',$jefe)}}" class="btn btn-primary m-1"><i class="fa-solid fa-pen-to-square"></i></a>
           
            <form class="form" action="{{route('jefes.destroy',$jefe)}}" method="POST">
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
        {{$jefes->links()}}
    </div>
    @else

    <div class="card-body"><strong>No hay resultados</strong></div>
   @endif
   </div>
   

