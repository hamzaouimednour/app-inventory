<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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

        if ($this->isMethod('PUT')) {
            $username = 'required|alpha_dash|max:250|unique:users,username,' . $this->get('id');
            $password = 'nullable|string|max:150';
            $password_confirm = 'nullable|required_with:password|string|same:password|max:150';
            $password_old = 'nullable|string|max:150';
            $role = 'required|numeric|min:1';
        }else if ($this->isMethod('PATCH')) {
            $username = 'required|alpha_dash|max:250|unique:users,username,' . $this->get('id');
            $password = 'nullable|string|max:150';
            $password_confirm = 'nullable|required_with:password|string|same:password|max:150';
            $password_old = 'nullable|required_with:password,password_confirmation|string|max:150';
            $role = 'nullable|numeric|min:1';
        }else{
            $username = 'required|alpha_dash|max:250|unique:users';
            $password = 'required|string|confirmed|max:150';
            $password_confirm = 'required|string|same:password|max:150';
            $password_old = 'nullable|string|max:150';
            $role = 'required|numeric|min:1';
        }
        return [
            'nom' => 'required|string|max:250',
            'prenom' => 'required|string|max:250',
            'role_id' => $role,
            'deuxieme_prenom' => 'nullable|string|max:250',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|numeric|digits_between:8,15',
            'telephone_mobile' => 'nullable|numeric|digits_between:8,15',
            'username' => $username,
            'password' => $password,
            'password_confirmation' => $password_confirm,
            'password_old' => $password_old,
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'username' => 'Pseudo d\'utilisateur',
            'password_confirmation' => 'Confirmation Mot de passe',
            'password_old' => 'Mot de passe actuel',
            'role_id' => 'Rôle',
            'img' => 'photo de profile',
        ];
    }
    
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'username' => Str::lower($this->username),
            'nom' => Str::title($this->nom),
            'prenom' => Str::title($this->prenom),
            'deuxieme_prenom' => Str::title($this->deuxieme_prenom),
        ]);
    }
}
