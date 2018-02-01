<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Compterendu

class CompterenduUpdateRequest extends FormRequest
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
        $id = $this->compterendus;
        return [
            'nomrencontre' =>'required|max:255|unique:compterendus,nomrencontre'. $id,
            'datematch' => 'required|max:10|unique:compterendus,datematch'. $id,
            'lieu' => 'required|max:255|unique:compterendus,lieu'. $id,
            'typerencontre' => 'unique:compterendus,typerencontre'. $id,
            'niveau' => 'unique:compterendus,niveau'. $id,
            'nomclub1' => 'required|unique:compterendus,nomclub1'. $id,
            'nomclub2' => 'required|unique:compterendus,nomclub2'. $id,
            'renseignement'=> 'unique:compterendus,renseignement'. $id,
            //'publicité' => 'unique:compterendus,publicité'. $id,
            'club_évalué' => 'max:255|unique:compterendus,club_évalué'. $id,
            'eval_technique' => 'unique:compterendus,eval_technique'. $id,
            'eval_physique' => 'unique:compterendus,eval_physique'. $id,
            'eval_fairplay' => 'unique:compterendus,eval_fairplay'. $id,
            'note' => 'unique:compterendus,note'. $id,
            'id_catégoriesports' => 'required|unique:compterendus,id_catégoriesport'. $id,
            'id_users' => 'required|unique:compterendus,id_users'. $id,
        ];
    }
}
