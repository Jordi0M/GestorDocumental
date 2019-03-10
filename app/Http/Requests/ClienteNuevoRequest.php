<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteNuevoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required', 
            'documento' => 'required', 
            'direccion' => 'required', 
            'provincia' => 'required', 
            'localidad' => 'required', 
            'cp' => 'required', 
            'telefono' => 'required', 
            'mail' => 'required',
        ];
    }

     public function messages()
    {
    return [
        'nombre.required' => 'El campo Nombre no puede estar vacio',
        'documento.required' => 'El campo DNI/NIF no puede estar vacio',
        'direccion.required' => 'El campo Direccion no puede estar vacio',
        'provincia.required' => 'El campo Provincia no puede estar vacio',
        'localidad.required' => 'El campo Localidad no puede estar vacio',
        'cp.required' => 'El campo CP no puede estar vacio',
        'telefono.required' => 'El campo Telefono no puede estar vacio',
        'mail.required' => 'El campo Mail no puede estar vacio',
    ];
    }
}