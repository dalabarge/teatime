<?php

namespace App\Http\Requests;

use App\Tea;
use Illuminate\Foundation\Http\FormRequest;

class RecommendationQuery extends FormRequest
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
            'caffeine'    => ['integer', 'min:0', 'max:100'],
            'rush'        => ['integer'],
            'type'        => ['string', 'in:'.implode(',', Tea::TYPES)],
        ];
    }
}
