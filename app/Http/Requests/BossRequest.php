<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BossRequest extends FormRequest
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
        $jefe = $this->route()->parameter('jefe');
       $rules= [
            'nombres'=>'required|max:45',
            'apellidos'=>'required|max:45',
            'ci'=>'required|unique:bosses|max:15',
            'correo'=>'required|email|unique:bosses|max:45',
            'telefono'=>'required|max:15',
            'sexo'=>'required|in:Masculino,Femenino',
            'codigo'=>'required|max:45',
            'serial'=>'required|max:45',
            'mercado'=>'numeric',
            'fecha_nacimiento'=>'date'
        ];
        if($jefe){
            $rules['ci'] = 'required|max:15|unique:bosses,ci,'.$jefe->id;
            $rules['correo'] = 'required|email|max:45|unique:bosses,correo,'.$jefe->id;
        }
        return $rules;
    }
}
