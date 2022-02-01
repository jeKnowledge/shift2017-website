<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
        // dd($this);
        return [
            'age' => 'filled|required|numeric',
            'student' => 'filled|required',
            'type' => 'filled|required',
            'bio' => 'filled|required|min:10',
            'skills' => 'filled|required|hashtags|at_least:6',
            'university' => 'required_if:student,1',
            'course' => 'required_if:student,1',
            'institution' => 'required_if:student,0',
            'role' => 'required_if:student,0',
            'pitch' => 'filled|required|min:10',
            'tshirt' => 'filled|required',
            'firstTime' => 'filled|required',
        ];
    }
}
