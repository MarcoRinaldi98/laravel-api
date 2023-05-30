<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects|max:150',
            'description' => 'nullable|max:65535',
            'type_id' => 'nullable|exists:types,id',
            'image' => 'nullable|image|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'il titolo è un campo obbligatorio',
            'title.unique' => 'il titolo utilizzato è già esistente',
            'title.max' => 'il titolo deve avere al massimo :max caratteri',
            'description.max' => 'la descizione deve avere al massimo :max caratteri'
        ];
    }
}
