<div class="card">
    <div class="card-header">
        <input class="form-control" placeholder="Buscar" wire:model.live="search"/>
    </div>
   @if ($users->count())
   <div class="card-body">
    <table class="table table-striped">

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if ($user->roles->pluck('name')->first() == 'admin' )
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td width="10px">
            
            </tr>
            @else
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td width="10px"><a class="btn btn-primary" href="{{route('admin.edit',$user)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
            
            </tr>
            @endif
            

            @endforeach
        </tbody>
    </table>

</div>
<div class="card-footer">
    {{$users->links(data: ['scrollTo' => false])}}
</div>


@else

<div class="card-body"><strong>No hay Resultados</strong></div>
   @endif

</div>