<?php

namespace App\Http\Requests;

use App\Models\SkillPoint;
use Illuminate\Foundation\Http\FormRequest;

class SkillPointRequest extends FormRequest
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
        $rules = SkillPoint::VALIDATION_RULES;

        if ($this->getMethod() == 'POST') { // store
            $rules += ['game_id' => ['required', 'integer']];
            $rules += ['planet_id' => ['required', 'integer']];
            $rules += ['name' => ['required', 'string', 'max:32']];
            $rules += ['description' => ['nullable', 'string', 'max:128']];
        }

        return $rules;
    }
}
