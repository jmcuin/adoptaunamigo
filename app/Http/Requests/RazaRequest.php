<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RazaRequest extends FormRequest
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
                    'raza' => 'unique:cat_razas|required|min:2'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'raza' => 'required|min:2'
                ];
            }
            default:break;
        }
    }
}
