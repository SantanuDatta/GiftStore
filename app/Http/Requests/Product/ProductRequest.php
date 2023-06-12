<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'status'      => ['filled'],
            'code'        => request()->hasFile('code')
            ? ['required', 'file', 'mimes:csv,txt', Rule::unique('products', 'code')]
            : ['required', Rule::unique('products', 'code')->ignore($this->product)],
        ];
    }
}
