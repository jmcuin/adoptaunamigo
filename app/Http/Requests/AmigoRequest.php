<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmigoRequest extends FormRequest
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
                    'edad' => 'required|min:1',
                    'id_especie' => 'required|not_in:0',
                    'id_raza' => 'required|not_in:0',
                    'tamanio' => 'required|not_in:0',
                    'caracter' => 'required|min:2',
                    'convivencia' => 'required|min:2',
                    'recomendaciones' => 'required|min:2',
                    'requisitos' => 'required|min:2',
                    'lugar_adopcion' => 'required|min:2'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nombre' => 'required|min:2',
                    'edad' => 'required|min:1',
                    'id_especie' => 'required|not_in:0',
                    'id_raza' => 'required|not_in:0',
                    'tamanio' => 'required|not_in:0',
                    'caracter' => 'required|min:2',
                    'convivencia' => 'required|min:2',
                    'recomendaciones' => 'required|min:2',
                    'requisitos' => 'required|min:2',
                    'lugar_adopcion' => 'required|min:2'
                ];
            }
            default:break;
        }
    }
}
