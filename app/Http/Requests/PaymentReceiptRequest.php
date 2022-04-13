<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentReceiptRequest extends FormRequest
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
        // The selected agent id is invalid.
        return [
            'agent_id' => 'required|exists:admin_balence_transfer_to_agents,agent_id',
            'type' => 'required',
            'amount' => 'required|numeric|gt:0',
            'remark' => 'required',
        ];

    }
    
    public function messages()
    {
        $messages = [
            'agent_id.required' => 'The agent field is required.',
            'agent_id.exists' => 'The selected agent is invalid.',
            
        ];

        return $messages;
    }


    public function persist()
    {
        return $this->only('agent_id', 'type', 'amount',  'remark');
            
    }
}
