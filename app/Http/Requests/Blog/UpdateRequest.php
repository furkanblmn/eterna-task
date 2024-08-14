<?php

namespace App\Http\Requests\Blog;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $blog = Blog::find($this->route('blog')->id);

        return $blog && $this->user()->can('update', $blog);
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
