<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'type' => 'required|in:particulier,societe',
        ];

        // Handle unique validation differently for create and update
        if ($this->isMethod('POST')) {
            // Create - require unique values
            $rules['id_client'] = 'required|string|unique:clients,id_client';
            $rules['email'] = 'nullable|email|unique:clients,email';
        } else {
            // Update - ignore current record in unique check
            $clientId = $this->route('client'); // Get the client ID from route
            $rules['email'] = 'nullable|email|unique:clients,email,' . $clientId . ',id';
        }

        // Common rules
        $rules += [
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'ville_id' => 'required|exists:villes,id',
            'postal_code' => 'nullable|string|max:10',
            'notes' => 'nullable|string',
        ];

        // Additional rules based on client type
        if ($this->input('type') === 'particulier') {
            $rules['full_name'] = 'required|string|max:100';
            $rules['civility'] = 'nullable|string|max:100';
        } else { // societe
            $rules['company_name'] = 'required|string|max:200';
            $rules['legal_form'] = 'nullable|string|max:50';
            $rules['contact_person'] = 'nullable|string|max:100';
            $rules['rc_number'] = 'nullable|string|max:50';
            $rules['ice'] = 'nullable|string|max:50';
        }

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
            'type.required' => 'Le type de client est requis.',
            'type.in' => 'Le type de client doit être particulier ou société.',
            'client_id.required' => "L'identifiant client est requis.",
            'client_id.unique' => 'Cet identifiant client existe déjà.',
            'full_name.required' => 'Le nom complet est requis.',
            'company_name.required' => 'La raison sociale est requise.',
            'email.email' => "L'adresse email n'est pas valide.",
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 20 caractères.',
            'address.max' => "L'adresse ne doit pas dépasser 255 caractères.",
            'city.max' => 'La ville ne doit pas dépasser 100 caractères.',
            'postal_code.max' => 'Le code postal ne doit pas dépasser 10 caractères.',
            'legal_form.max' => 'La forme juridique ne doit pas dépasser 50 caractères.',
            'contact_person.max' => 'Le nom du contact ne doit pas dépasser 100 caractères.',
            'rc_number.max' => 'Le numéro de registre commercial ne doit pas dépasser 50 caractères.',
            'ice.max' => 'Le numéro d\'ICE ne doit pas dépasser 50 caractères.',
        ];
    }
}
