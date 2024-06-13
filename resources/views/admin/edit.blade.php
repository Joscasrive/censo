@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Asignar Rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre:
        <p class="form-control">{{$user->name}}</p>
        <h2 class="h5">Role List</h2>
        {{html()->form('PUT',route('admin.update',$user))->open()}}
        @foreach ($roles as $role)
        <div>
            <label >
                <input type="checkbox" name="roles[]" value="{{ $role->id }}" @isset($select){{ in_array($role->id, $select)? 'checked' : '' }}@endisset>
        
                {{ $role->name }}
            </label>
        </div>
            
        @endforeach
        {{html()->submit('Asignar')->class('btn btn-primary')}}
        {{html()->form()->open()}}
    </div>
</div>
    
@stop


@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
@if (session('info'))
<script>  
     Swal.fire({
  title: "Exito!",
  text: "{{session('info')}}",
  icon: "success"
});
</script>
@endif
@stop