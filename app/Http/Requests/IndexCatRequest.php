<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexCatRequest extends FormRequest
{
    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'shelter_id' => ['sometimes', 'integer', 'exists:shelters,id'],
        ];
    }

    public function queryParameters(): array
    {
        return [
            'shelter_id' => [
                'description' => 'The shelter id',
                'example' => 1,
            ],
        ];
    }
}
