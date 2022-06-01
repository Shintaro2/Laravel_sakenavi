<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SakeRequest extends FormRequest
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
            "sakename" => 'required',
            "prefecturename" => 'required',
            "scent" => 'required',
            "acidity" => 'required',
            "taste" => 'required',
            "sweetness" => 'required',
            "score" => 'required',
        ];
    }
}
