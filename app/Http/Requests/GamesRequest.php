<?php

namespace App\Http\Requests;

use App\Models\Games;
use Illuminate\Foundation\Http\FormRequest;

class GamesRequest extends FormRequest
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
        $rules = Games::VALIDATION_RULES;

        if ($this->getMethod() == 'POST') { // store
            // $rules += ['sth' => 'string'];
        } else { // update
            // $rules += ['sth' => 'string'];
        }

        return $rules;
    }
}
