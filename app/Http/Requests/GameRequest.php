<?php

namespace App\Http\Requests;

use App\Models\Game;
use App\Models\Platform;
use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
        $rules = Game::VALIDATION_RULES;

        if ($this->getMethod() == 'POST') { // store
            // $rules += ['sth' => 'string'];
        } else { // update
//             $rules += ['approve' => 'boolean'];
        }

        return $rules;
    }
}
