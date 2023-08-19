<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPermissionRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'groups' => 'required|min:1',
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
            'user_id' => 'Utilisateur',
            'groups' => 'Groupe(s) de permissions'
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
            'groups' => json_encode($this->groups)
        ]);
    }
}
