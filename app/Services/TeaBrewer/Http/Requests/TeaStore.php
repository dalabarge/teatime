<?php

namespace App\Services\TeaBrewer\Http\Requests;

use App\Services\TeaBrewer\Models\Tea;
use Illuminate\Foundation\Http\FormRequest;

class TeaStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

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
