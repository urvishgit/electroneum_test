<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'email' => 'bail|required|email|min:5|max:100|unique:users,email,'. auth()->user()->id,
            'about' => 'required|min:5',
            'address' => 'required|min:5',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A name is required.',
            'email.required' => 'A email is required.',
            'email.unique' => 'Email is already in used.',
            'email.email' => 'Please enter valid email address.',
            'about.required' => 'A about is required.',
            'address.required' => 'A address is required.',
            'phone.required' => 'A phone is required.',
            'mobile.required' => 'A mobile is required.',
        ];
    }
}
