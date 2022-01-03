<?php

namespace App\Http\Requests;

use App\Models\Organization;
use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
        $rules = Organization::VALIDATION_RULES;

        if ($this->getMethod() == 'POST') { // store
            $rules += ['galaxy_id' => ['integer']];
            $rules += ['name' => ['required', 'string', 'max:32']];
            $rules += ['description' => ['nullable', 'string', 'max:500']];
            $rules += ['image' => ['nullable', 'image', 'max:5048']];
        }

        return $rules;
    }
}
