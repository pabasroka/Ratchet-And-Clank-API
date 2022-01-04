<?php

namespace App\Http\Requests;

use App\Models\Gadget;
use Illuminate\Foundation\Http\FormRequest;

class GadgetRequest extends FormRequest
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
        $rules = Gadget::VALIDATION_RULES;

        if ($this->getMethod() == 'POST') { // store
            $rules += ['game_id' => ['integer']];
            $rules += ['name' => ['required', 'string', 'max:32']];
            $rules += ['image' => ['nullable', 'image', 'max:5048']];
        }

        return $rules;
    }
}
