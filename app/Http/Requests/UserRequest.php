<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        return match ($this->route()->getActionMethod()) {
            'register'   =>  $this->getRegisterRules(),
            'login'      =>  $this->getLogInRules(),
        };
    }

    public function getRegisterRules()
    {
        return [
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email',
            // 'password'      => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/',
            'password'      => 'required',
        ];
    }

    public function getLogInRules()
    {
        return [
            'email'         => 'required|email|exists:users,email',
            // 'password'      => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/',
            'password'      => 'required',
        ];
    }
}
