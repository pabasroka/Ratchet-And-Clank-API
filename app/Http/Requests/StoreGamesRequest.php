<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGamesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:64'],
            'subtitle' => ['nullable', 'string', 'max:64'],
            'cover'  => ['nullable', 'string'],
            'release'  => ['required', 'string'],
            'platforms'  => ['required', 'string'],
            'developers' => ['nullable', 'string'],
            'directors' => ['nullable', 'string'],
            'composer' => ['nullable', 'string'],
        ];
    }
}
