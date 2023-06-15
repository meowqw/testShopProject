<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductValidator extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|between:1,9999999',
            'barcode_id' => 'required|integer',
            'category_id' => 'required|integer',
            'tags' => 'array'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Поле :attribute обязательно',
            'title.string' => 'Поле должно быть строкой',
            'description.string' => 'Поле должно быть строкой',
            'description.required' => 'Поле :attribute обязательно',
            'price.required' => 'Поле :attribute обязательно',
            'price.numeric' => 'Поле должно быть числом',
            'price.between' => 'Сумма товара должна быть от :min до :max',
            'barcode_id.required' => 'Поле :attribute обязательно',
            'barcode_id.integer' => 'Поле должно быть числом',
            'category.integer' => 'Поле должно быть числом',
            'category.required' => 'Поле :attribute обязательно',
            'tags.array' => 'Поле должно быть массивом',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголвоок',
        ];
    }

}
