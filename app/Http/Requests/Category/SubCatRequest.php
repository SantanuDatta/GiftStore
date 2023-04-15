<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubCatRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:25', Rule::unique('categories', 'name')->ignore($this->category->id)],
            'slug' => ['filled', 'max:25', Rule::unique('categories', 'slug')->ignore($this->category->id)],
            'is_parent' => ['nullable'],
            'description' => ['nullable'],
            'regular_price' => ['required', 'numeric', 'min:0', 'not_in:0'],
            'discount' => ['nullable', 'numeric', 'min:0', 'not_in:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,max:2048'],
            'is_featured' => ['nullable'],
            'status' => ['required'],
        ];
    }
}
