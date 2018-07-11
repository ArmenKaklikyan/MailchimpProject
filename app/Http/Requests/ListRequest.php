<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
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
        $rules = [
            'name'                         => 'required',
            'contact'                      => 'required|array',
            'contact.company'              => 'required',
            'contact.address1'             => 'required',
            'contact.city'                 => 'required',
            'contact.state'                => 'required',
            'contact.zip'                  => 'required',
            'contact.country'              => 'required',
            'permission_reminder'          => 'required',
            'campaign_defaults'            => 'required|array',
            'campaign_defaults.from_name'  => 'required',
            'campaign_defaults.from_email' => 'required',
            'campaign_defaults.subject'    => 'required',
            'campaign_defaults.language'   => 'required',
            'email_type_option'            => 'required|boolean',
        ];

        return $rules;
    }
    public function messages()
    {
        return [
            'contact.company.required'              => 'Company is required!',
            'contact.address1.required'             => 'Address is required!',
            'contact.city.required'                 => 'City is required!',
            'contact.state.required'                => 'State is required!',
            'contact.zip.required'                  => 'Zip is required!',
            'contact.country.required'              => 'Country is required!',
            'permission_reminder.required'          => 'Permission reminder is required!',
            'campaign_defaults.required'            => 'Campaign defaults is required!',
            'campaign_defaults.array'               => 'Campaign defaults must be an array!',
            'campaign_defaults.from_name.required'  => 'From name is required!',
            'campaign_defaults.from_email.required' => 'From email is required!',
            'campaign_defaults.subject.required'    => 'Subject is required!',
            'campaign_defaults.language.required'   => 'Language is required!',
            'email_type_option.required'            => 'Email type option is required!',
            'email_type_option.boolean'             => 'Email type option must be boolean!',
        ];
    }
}