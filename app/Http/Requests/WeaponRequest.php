<?php

namespace App\Http\Requests;

use App\Models\Weapon;
use Illuminate\Foundation\Http\FormRequest;

class WeaponRequest extends FormRequest
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
        $rules = Weapon::VALIDATION_RULES;

        if ($this->getMethod() == 'POST') {
            $rules += ['game_id' => ['integer']];
            $rules += ['name' => ['required', 'string', 'max:32']];
            $rules += ['price' => ['nullable', 'numeric', 'between:0,99999999999.99']];
            $rules += ['range' => ['nullable', 'string', 'max:12']];
            $rules += ['rate_of_fire' => ['nullable', 'string', 'max:12']];
            $rules += ['image' => ['nullable', 'image', 'max:5048']];
        }

        return $rules;
    }
}
