<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
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
                    'a_paterno' => 'required|min:2',
                    'a_materno' => 'min:2',
                    'curp' => 'unique:alumnos|required|min:18|max:18',
                    'id_estado' => 'required|not_in:0',
                    'id_estado_municipio' => 'required|not_in:0',
                    'calle' => 'required|min:2',
                    'colonia' => 'required|min:2',
                    'cp' => 'required|integer|min:5',
                    'telefono' => 'required|min:5',
                    'email' => 'required|email',
                    'confirmaemail' => 'required|same:email',
                    'id_religion' => 'required|not_in:0',
                    'tipo_sangre' => 'required|min:2',
                    'foto' => 'image',

                    //validaciones del padre
                    'id_papa' => 'required|not_in:0',
                    'nombre_padre' => 'required|min:2',
                    'a_paterno_padre' => 'required|min:2',
                    'curp' => 'unique:padres_de_alumnos|required|min:18|max:18',
                    'celular_padre' => 'required|min:5',
                    'empleo_padre' => 'required|min:2',

                    //validaciones de la madre
                    'id_mama' => 'required|not_in:0',
                    'nombre_madre' => 'required|min:2',
                    'a_paterno_madre' => 'required|min:2',
                    'curp' => 'unique:padres_de_alumnos|required|min:18|max:18',
                    'celular_madre' => 'required|min:5',
                    'empleo_madre' => 'required|min:2',

                    //Validaciones de antecedentes medicos
                    'alergia' => 'required|min:2',
                    'enfermedad' => 'required|min:2',
                    'medicina' => 'required|min:2',
                    'cirugia' => 'required|min:2',
                    'medico' => 'required|min:2',
                    'telefono_medico' => 'required|min:2',
                    'nombre_referencia1' => 'required|min:2',
                    'telefono_referencia1' => 'required|min:2',
                    'nombre_referencia2' => 'required|min:2',
                    'telefono_referencia2' => 'required|min:2'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nombre' => 'required|min:2',
                    'a_paterno' => 'required|min:2',
                    'a_materno' => 'min:2',
                    'curp' => 'required|min:18',
                    'id_estado' => 'required|not_in:0',
                    'id_estado_municipio' => 'required|not_in:0',
                    'calle' => 'required|min:2',
                    'colonia' => 'required|min:2',
                    'cp' => 'required|integer|min:5',
                    'telefono' => 'required|min:5',
                    'email' => 'required|email',
                    'confirmaemail' => 'required|same:email',
                    'id_religion' => 'required|not_in:0',
                    'tipo_sangre' => 'required|min:2',
                    'foto' => 'image',

                    //validaciones del padre
                    'id_papa' => 'required|not_in:0',
                    'nombre_padre' => 'required|min:2',
                    'a_paterno_padre' => 'required|min:2',
                    'curp_padre' => 'required|min:18|max:18',
                    'celular_padre' => 'required|min:5',
                    'empleo_padre' => 'required|min:2',

                    //validaciones de la madre
                    'id_mama' => 'required|not_in:0',
                    'nombre_madre' => 'required|min:2',
                    'a_paterno_madre' => 'required|min:2',
                    'curp_madre' => 'required|min:18|max:18',
                    'celular_madre' => 'required|min:5',
                    'empleo_madre' => 'required|min:2',

                    //Validaciones de antecedentes medicos
                    'alergia' => 'required|min:2',
                    'enfermedad' => 'required|min:2',
                    'medicina' => 'required|min:2',
                    'cirugia' => 'required|min:2',
                    'medico' => 'required|min:2',
                    'telefono_medico' => 'required|min:2',
                    'nombre_referencia1' => 'required|min:2',
                    'telefono_referencia1' => 'required|min:2',
                    'nombre_referencia2' => 'required|min:2',
                    'telefono_referencia2' => 'required|min:2'
                ];
            }
            default:break;
        }
    }
}
