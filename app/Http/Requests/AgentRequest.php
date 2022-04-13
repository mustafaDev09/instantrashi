<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
            'agent_login_id' => 'required',
            'agent_name' => 'required',
            'limit' => 'required|numeric|gte:min_bet',
            'min_bet' => 'required|numeric',
            'phone_no' => 'required|digits:10||numeric',
            'city' => 'required',
            'password' => 'required',
         ];
        
    }
}
