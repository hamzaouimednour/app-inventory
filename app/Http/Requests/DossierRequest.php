<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class DossierRequest extends FormRequest
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
        if ($this->isMethod('PATCH')) {
            $subdomainRule = 'required|alpha_dash|max:250|unique:dossiers,subdomain,' . $this->get('id');
            $dbRule = 'required|alpha_dash|max:250|unique:dossiers,dossier_db_name,' . $this->get('id');
        }else{
            $subdomainRule = 'required|alpha_dash|max:250|unique:dossiers';
            $dbRule = 'required|alpha_dash|max:250|unique:dossiers';
        }
        return [
            'name' => 'required|string|max:250',
            'date_license' => 'required|boolean',
            'subdomain' => $subdomainRule,
            'dossier_db_name' => $dbRule,
            'user_licenses' => 'nullable|alpha_num|max:150',
            'dossier_licenses' => 'nullable|alpha_num|max:150',
            'license_start_date' => 'nullable|date|after_or_equal:today|date_format:Y-m-d',
            'license_end_date' => 'nullable|date|after:license_start_date|date_format:Y-m-d',
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
            'name' => 'Libellé',
            'dossier_db_name' => 'Nom de Base de données',
            'license_start_date' => 'Date début de Licence',
            'license_end_date' => 'Date fin de Licence',
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
            'subdomain' => Str::lower($this->subdomain),
            'dossier_db_name' => Str::lower($this->dossier_db_name)
        ]);
    }

}
