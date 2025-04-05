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
        return [
            'immatriculation' => 'required|string|unique:vehicules,immatriculation,' ,
            'n_chassis' => 'required|string',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'annee_fabrication' => 'required|numeric',
            'type_carburant' => 'required|string',
            'categorie' => 'required|string',
            'couleur' => 'required|string',
        ];
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
            'immatriculation.unique' => 'L\'immatriculation doit être unique.',
            'n_chassis.required' => 'Le numéro de châssis est requis.',
            'marque.required' => 'La marque est requise.',
            'modele.required' => 'Le modèle est requis.',
            'annee_fabrication.required' => 'L\'année de fabrication est requise.',
            'annee_fabrication.numeric' => 'L\'année de fabrication doit être un nombre.',
            'type_carburant.required' => 'Le type de carburant est requis.',
            'categorie.required' => 'La catégorie est requise.',
            'couleur.required' => 'La couleur est requise.',
        ];
    }
}
