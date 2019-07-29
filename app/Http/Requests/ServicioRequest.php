<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'servicio' => 'required|min:2',
                    'descripcion' => 'required|min:2',
                    'precio' => 'required|min:2',
                    'terminos_y_condiciones' => 'required|min:2',
                    'telefono' => 'required|min:2',
                    'email' => 'email|required|min:2',
                    'enlace_facebook' => 'required|min:2',
                    'foto' => 'image'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'servicio' => 'required|min:2',
                    'descripcion' => 'required|min:2',
                    'precio' => 'required|min:2',
                    'terminos_y_condiciones' => 'required|min:2',
                    'telefono' => 'required|min:2',
                    'email' => 'email|required|min:2',
                    'enlace_facebook' => 'required|min:2',
                    'foto' => 'image'
                ];
            }
            default:break;
        }
    }
}
