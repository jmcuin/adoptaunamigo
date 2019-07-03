<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdopcionRequest extends FormRequest
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
                    'id_amigo' => 'required|not_in:0',
                    'nombre_adoptante' => 'required|min:2',
                    'direccion_adoptante' => 'required|min:2',
                    'email' => 'required|min:2',
                    'telefono' => 'required|min:2',
                    'detalles_adopcion' => 'required|min:2'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'id_amigo' => 'required|not_in:0',
                    'nombre_adoptante' => 'required|min:2',
                    'direccion_adoptante' => 'required|min:2',
                    'email' => 'required|min:2',
                    'telefono' => 'required|min:2',
                    'detalles_adopcion' => 'required|min:2'
                ];
            }
            default:break;
        }
    }
}
