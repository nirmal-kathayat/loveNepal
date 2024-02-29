<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WildSpeciesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'wildlifetype_id' => 'required',
            'image' => 'required',
            'overview' => 'nullable',
            'physical_characteristics' => 'nullable',
            'conservation_status' => 'nullable',
            'significance_protection' => 'nullable'
        ];
    }
}
