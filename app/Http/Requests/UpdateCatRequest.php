<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCatRequest extends FormRequest
{
    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'shelter_id' => ['nullable', 'integer', 'exists:shelters,id'],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
        ];
    }
}
