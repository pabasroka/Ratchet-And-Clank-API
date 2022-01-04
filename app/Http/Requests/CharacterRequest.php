<?php

namespace App\Http\Requests;

use App\Models\Character;
use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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
        $rules = Character::VALIDATION_RULES;

        if ($this->getMethod() == 'POST') { // store
            $rules += ['game_id' => ['integer']];
            $rules += ['galaxy_id' => ['integer']];
            $rules += ['race_id' => ['integer']];
            $rules += ['location_id' => ['nullable', 'integer']];
            $rules += ['name' => ['required', 'string', 'max:32']];
            $rules += ['gender' => ['nullable', 'string', 'max:12']];
            $rules += ['state' => ['nullable', 'string', 'max:12']];
            $rules += ['eyes' => ['nullable', 'string', 'max:12']];
            $rules += ['skin' => ['nullable', 'string', 'max:12']];
            $rules += ['hair' => ['nullable', 'image', 'max:5048']];
            $rules += ['image' => ['nullable', 'image', 'max:5048']];
        }

        return $rules;
    }
}
