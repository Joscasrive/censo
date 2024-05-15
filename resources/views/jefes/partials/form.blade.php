
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
        {{html()->label('Codigo','codigo')}}
        {{html()->text('codigo')->class('form-control')->placeholder('Ingrese el codigo del carnet')->autocomplete(false)->required()}}
        @error('codigo')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class=" col-sm form-group">
        {{html()->label('Serial','serial')}}
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
        {{html()->label('Edad','edad')}}
        {{html()->text('edad')->class('form-control')->placeholder('Ingrese la edad')->autocomplete(false)->required()}}
        @error('edad')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class=" col-sm form-group">
        {{html()->label('Sexo','sexo')}}
        {{html()->select('sexo',  ['Masculino'=>'Masculino','Femenino'=>'Femenino'])->class('form-control')->required()}}
        @error('sexo')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class=" col-sm form-group">
        {{html()->label('Mercado','mercado')}}
        {{html()->text('mercado')->class('form-control')->placeholder('Ingrese el numero de mercado que recibe')}}
        @error('mercado')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>
<div class="row">
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
