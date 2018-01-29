<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Joueur;

class JoueurUpdateRequest extends FormRequest
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
        $id = $this->joueur;
        return [
            'nolicence' =>'required|max:255|unique:joueurs,nolicence'. $id,
            'fullname' =>'required|max:255|unique:joueurs,fullname'. $id,
            'id_équipes' => 'unique:joueurs,id_équipes'. $id,
            'id_compterendus' => 'unique:joueurs,id_compterendus'. $id,
        ];
    }
}
