<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
        $contactId = $this->route('contact');
        return [
            'name' => 'required|string|min:6',
            'contact' => 'required|digits:9|unique:contacts,contact,' . ($contactId ? $contactId->id : null),
            'email' => 'required|email|unique:users,email,' . ($contactId ? $contactId->id : null),
        ];
    }
}
