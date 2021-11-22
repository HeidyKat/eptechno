<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'string|required|max:255',
            'ced'=>'string|required|unique:clients,ced, '.$this->route('client')->id.'|min:8|max:10',
            'address'=>'nullable|string|max:255',
            'phone'=>'string|nullable|unique:clients,phone, '.$this->route('client')->id.'|min:9|max:10',
            'email'=>'string|nullable|unique:clients,email, '.$this->route('client')->id.'|max:255|email:rfc,dns',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permite 255 caracteres.',

            'ced.string'=>'El dato no es correcto.',
            'ced.required'=>'Este campo es requerido.',
            'ced.unique'=>'Esta cédula ya se encuentra registrada.',
            'ced.min'=>'Se requiere de 10 caracteres.',
            'ced.max'=>'Solo se permite 10 caracteres.',

            'address.string'=>'El dato no es correcto.',
            'address.max'=>'Solo se permite 255 caracteres.',

            'phone.string'=>'El valor no es correcto.',
            'phone.unique'=>'El valor de celular ya se encuentra registrado.',
            'phone.min'=>'Se requiere de 10 caracteres.',
            'phone.max'=>'Solo se permite 10 caracteres.',

            'email.string'=>'El valor no es correcto.',
            'email.unique'=>'La dirección de correo electrónico ya se encuentra registrado.',
            'email.max'=>'Solo se permite 255 caracteres.',
            'email.email'=>'No es correo electrónico.',



        ];
    }
}
