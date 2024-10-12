<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        $rules = [
            'title' => ['required', 'min:20', 'max:255', Rule::unique('blogs')->ignore($this->blog)],
            'slug' => ['required', 'min:20', 'max:255', Rule::unique('blogs')->ignore($this->blog)],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['string'],
            'images' => ['required', 'min:1'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:1024', 'dimensions:max_width=2000,max_height=2000'],
            'excerpt' => ['required', 'min:100'],
            'body' => ['required', 'min:200'],
            'published_at' => ['nullable', 'date', 'after_or_equal:now'],
            'status' => ['required'],
        ];
        return $rules;
    }
}
