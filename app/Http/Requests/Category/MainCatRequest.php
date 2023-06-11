<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MainCatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:25', Rule::unique('categories', 'name')->ignore($this->category)],
            'slug' => ['filled', 'max:25', Rule::unique('categories', 'slug')->ignore($this->category)],
            'is_parent' => ['nullable'],
            'description' => ['nullable'],
            'regular_price' => ['nullable'],
            'discount' => ['nullable'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'is_featured' => ['nullable'],
            'status' => ['required'],
        ];
    }
}
