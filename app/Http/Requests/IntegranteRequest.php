<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntegranteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $integrante = $this->route()->parameter('integrante');
        $rules= [
            'nombres'=>'required|max:45',
            'apellidos'=>'required|max:45',
            'ci'=>'required|unique:integrantes|max:15',
            'fecha_nacimiento'=>'required|date',
            'correo'=>'email|unique:integrantes|max:45',
            'telefono'=>'required|max:15',
            'sexo'=>'required|in:Masculino,Femenino',
            'tipo_persona'=>'required|in:Miembro,Jefe',
            'familia_id'=>'required|exists:familias,nro_familiar',
            'codigo'=>'required|max:45',
            'serial'=>'required|max:45',
            'status'=>'in:1,2',
            'observacion'=>'max:400'
        ];
        if($integrante){
            $rules['ci']='required|max:15|unique:integrantes,ci,'.$integrante->id;
            $rules['correo']='email|max:45|unique:integrantes,correo,'.$integrante->id;
        }
        return $rules;
    }
}
