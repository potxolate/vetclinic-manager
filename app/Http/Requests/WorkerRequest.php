<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',            
            'clinic_id' => 'required|exists:clinics,id',
            'mail' => [
                'required',
                'email',
                Rule::unique('workers')->ignore($this->worker)
            ],
            'phone' => 'required|string|max:15',
        ];
    }
}
