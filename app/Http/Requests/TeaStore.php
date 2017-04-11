<?php

namespace App\Http\Requests;

use App\Tea;
use Illuminate\Foundation\Http\FormRequest;

class TeaStore extends FormRequest
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
        return [
            'caffeine'    => ['required', 'integer', 'min:0', 'max:100'],
            'name'        => ['required', 'string'],
            'temperature' => ['required', 'integer', 'min:0', 'max:212'],
            'time'        => ['required', 'integer', 'min:0'],
            'type'        => ['required', 'string', 'in:'.implode(',', Tea::TYPES)],
        ];
    }
}
