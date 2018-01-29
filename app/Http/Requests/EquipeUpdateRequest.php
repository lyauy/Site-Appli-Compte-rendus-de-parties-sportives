<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Equipe;


class EquipeUpdateRequest extends FormRequest
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
        $id = $this->equipe;
        return [
            'nomclub' =>'required|max:255|unique:équipes,nomclub'. $id,
            'nomdirecteur' =>'required|max:255|unique:équipes,nomdirecteur'. $id,
            'id_compterendus' => 'unique:équipes,id_compterendus'. $id,


        ];
    }
}
