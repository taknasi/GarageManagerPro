<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'immatriculation' => 'nullable|string',
            'n_chassis' => 'nullable|numeric',
            'marque' => 'nullable|string',
            'modele' => 'nullable|string',
            'annee_fabrication' => 'nullable|numeric',
            'type_carburant' => 'nullable|string',
            'categorie' => 'nullable|string',
            'couleur' => 'nullable|string',
        ];

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'immatriculation.required' => 'L\'immatriculation est requise.',
            'id.required' => "L'identifiant du véhicule est requis.",
            'id.unique' => 'Cet identifiant de véhicule existe déjà.',
            'n_chassis.required' => 'Le numéro de châssis est requis.',
            'marque.required' => 'La marque est requise.',
            'modele.required' => 'Le modèle est requis.',
            'annee_fabrication.required' => 'L\'année de fabrication est requise.',
            'type_carburant.required' => 'Le type de carburant est requis.',
            'categorie.required' => 'La catégorie est requise.',
            'couleur.required' => 'La couleur est requise.',
        ];
    }
}
