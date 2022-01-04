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
        }

        return $rules;
    }
}
