<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtravioRequest extends FormRequest
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
                    'ultimo_avistamiento_fecha' => 'required|before:tomorrow',
                    'ultimo_avistamiento_lugar' => 'required|min:2',
                    'descripcion_amigo' => 'required|min:2',
                    'descripcion_evento' => 'required|min:2',
                    'senias_particulares' => 'required|min:2',
                    'contacto_persona' => 'required|min:2',
                    'telefono' => 'required|min:2',
                    'email' => 'required|email',
                    'confirmaemail' => 'required|same:email'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nombre' => 'required|min:2',
                    'ultimo_avistamiento_fecha' => 'required|before:tomorrow',
                    'ultimo_avistamiento_lugar' => 'required|min:2',
                    'descripcion_amigo' => 'required|min:2',
                    'descripcion_evento' => 'required|min:2',
                    'senias_particulares' => 'required|min:2',
                    'contacto_persona' => 'required|min:2',
                    'telefono' => 'required|min:2',
                    'email' => 'required|email',
                    'confirmaemail' => 'required|same:email'
                ];
            }
            default:break;
        }
    }
}