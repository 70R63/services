<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarFormularioRequest extends FormRequest
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
            'name'                  => 'required|min:1|max:30',
            'email'                 => 'required|unique:users|email|max:50',
            'password'              => 'required|between:8,12|confirmed',
            'password_confirmation' => 'required',
            'slug'                  => 'required|max:20',
            'roles_permisos'        => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required'         =>  'El :attribute es obligatorio',
            'name.min'              =>  'El :attribute debe contener mas de un caracter',
            'name.max'              =>  'El :attribute debe contener un máximo de 30 caracteres',

            'email.required'        =>  'El :attribute es obligatorio',
            'email.unique'          =>  'El :attribute ya existe en la Base de Datos',
            'email.email'           =>  'El :attribute debe ser un correo válido',
            'email.max'             =>  'El :attribute debe contener un máximo de 50 caracteres',

            'password.required'     =>  'El :attribute es obligatorio',
            'password.between'      =>  'El :attribute debe contener entre 8 y12 caracteres',
            'password.confirmed'     =>  'El :attribute no coinciden',

            'roles_permisos.required'         =>  'Debes seleccionar al menos un :attribute',
                
        ];
    }
    public function attributes()
    {
        return [

            'name'              => 'nombre de usuario',
            'email'             => 'correo electronico',
            'password'          => 'password',
            'roles_permisos'    => 'Rol',
           
        ];
    }
}
