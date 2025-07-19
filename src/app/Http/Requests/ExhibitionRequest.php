<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'condition_name' => 'required|string|max:255',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '商品名は必須です。',
            'description.required' => '商品の説明は必須です。',
            'price.required' => '価格は必須です。',
            'condition_name.required' => '商品の状態は必須です。',
            'categories.required' => 'カテゴリーを1つ以上選択してください。',
            'categories.*.exists' => '選択されたカテゴリーが存在しません。',
        ];
    }
}

