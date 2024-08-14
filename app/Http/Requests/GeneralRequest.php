<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GeneralRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100',
            'sub_title' => 'required_if:has_sub_title,1|string|max:255',
            'content' => 'required_if:has_content,1|string',
            'status' => 'required|numeric|boolean',
            'has_sub_title' => 'required|boolean',
            'has_content' => 'required|boolean'
        ];
    }
}
