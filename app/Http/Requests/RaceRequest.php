<?php

namespace App\Http\Requests;

use App\Models\Race;
use Illuminate\Foundation\Http\FormRequest;

class RaceRequest extends FormRequest
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
        $rules = Race::VALIDATION_RULES;

        if ($this->getMethod() == 'POST') { // store
             $rules += ['name' => ['required', 'string', 'max:32']];
        }

        return $rules;
    }
}
