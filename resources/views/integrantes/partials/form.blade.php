<div class="row">
    <div class="col-sm  form-group">
        {{html()->label('Nombres','nombres')}}
        {{html()->text('nombres')->class('form-control')->placeholder('Ingrese los nombres')->autocomplete(false)->required()}}
        @error('nombres')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class=" col-sm form-group">
        {{html()->label('Apellidos','apellidos')}}
        {{html()->text('apellidos')->class('form-control')->placeholder('Ingrese los apellidos')->autocomplete(false)->required()}}
        @error('apellidos')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>
<div class="row">
    <div class=" col-sm form-group">
        {{html()->label('Codigo Patria','codigo')}}
        {{html()->text('codigo')->class('form-control')->placeholder('Ingrese el codigo del carnet')->autocomplete(false)->required()}}
        @error('codigo')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class=" col-sm form-group">
        {{html()->label('Serial Patria','serial')}}
        {{html()->text('serial')->class('form-control')->placeholder('Ingrese el serial del carnet')->autocomplete(false)->required()}}
        @error('serial')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>
<div class="row">
    
    <div class=" col-sm form-group">
        
        {{html()->label('Ci','ci')}}
        {{html()->text('ci')->class('form-control')->placeholder('Ingrese la cedula')->autocomplete(false)->required()}}
        @error('ci')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class=" col-sm form-group">
        {{html()->label('Fecha de Nacimiento','fecha_nacimiento')}}
        {{html()->date('fecha_nacimiento')->class('form-control')->required()}}
        @error('fecha_nacimiento')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    
    <div class=" col-sm form-group">
        {{html()->label('Miembro/Jefe','tipo_persona')}}
        {{html()->select('tipo_persona',['Miembro'=>'Miembro','Jefe'=>'Jefe'])->class('form-control')->required()}}
        @error('tipo_persona')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class=" col-sm form-group">
        {{html()->label('Grupo Familiar','familia_id')}}
        @if(isset($integrante))
        {{html()->text('familia_id',$integrante->familia->nro_familiar)->placeholder('Ingrese el numero familiar')->required()->class('form-control')}}
        @else
        {{html()->text('familia_id')->placeholder('Ingrese el numero familiar')->required()->class('form-control')}}
        @endif
        
        @error('familia_id')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>
<div class="row">
    <div class=" col-sm form-group">
        {{html()->label('Sexo','sexo')}}
        {{html()->select('sexo',  [''=>'Seleccione el sexo','Masculino'=>'Masculino','Femenino'=>'Femenino'])->class('form-control sexo')->required()}}
        <div class="embarazada" style="display: none">
        {{html()->label('Embarazada','status')}}
        <input type="checkbox" name="status" id="status" value="2" @isset($integrante->status)@if($integrante->status =="2") {{'checked'}} @endif @endisset>
        </div>
        @error('sexo')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    

    <div class=" col-sm form-group">
        {{html()->label('Correo','correo')}}
        {{html()->email('correo')->class('form-control')->placeholder('Ingrese el correo electronico')->autocomplete(false)->required()}}
        @error('correo')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class=" col-sm form-group">
        {{html()->label('Telefono','telefono')}}
        {{html()->text('telefono')->class('form-control')->placeholder('Ingrese el nro de telefono')->autocomplete(false)->required()}}
        @error('telefono')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    
</div>
<div class="row">
    <div class=" col-sm form-group">
        {{html()->label('Observacion','observacion')}}
        {{html()->textarea('observacion')->class('form-control')}}
        @error('observacion')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    
</div>
