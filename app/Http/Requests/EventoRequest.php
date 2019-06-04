<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
                    'nombre' => 'required|min:2',
                    'descripcion' => 'required|min:2',
                    'lugar' => 'required|min:2',
                    'fecha' => 'required|after:today',
                    'hora' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nombre' => 'required|min:2',
                    'descripcion' => 'required|min:2',
                    'lugar' => 'required|min:2',
                    'fecha' => 'required|after:today',
                    'hora' => 'required'
                ];
            }
            default:break;
        }
    }
}
