<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompterenduCreateRequest extends FormRequest
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
            'id_catégoriesports' => 'max:5000',       
            'nomrencontre' =>'required|max:5000',
            'datematch' => 'required|max:5000',
            'lieu' => 'required|max:5000',
            'typerencontre' => 'max:5000',
            'niveau' => 'max:5000',
            'renseignement' => 'max:5000',
            //'publicité' => 'unique:compterendus',
            'club_évalué' => 'max:5000',
            'eval_technique' => 'max:5000',
            'eval_physique' => 'max:5000',
            'eval_fairplay' => 'max:5000',
            'note' => 'max:5000'

        ];
    }
}
