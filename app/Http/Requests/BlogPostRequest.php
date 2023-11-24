<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
        $id = Route::current()->parameter('post');

        return [
            'title' => ["required", "min:4", "max:255", Rule::unique('blog_posts')->ignore($id)],
            'description' => ["required", "min:4", "max:1000"],
            'content' => ["required", "min:255", "max:30000"],
            'categories' => ['array', 'exists:categories,id', 'required']
        ];
    }
}
