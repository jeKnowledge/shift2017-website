<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoadTripRequest extends FormRequest
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
            //
            'location' => 'required',
            'institution' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'password' => 'required_unless:action,edit|min:6',
        ];
    }
}
