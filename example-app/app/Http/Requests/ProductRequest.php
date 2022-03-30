<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'category_id' => 'required',
            'name' => 'required|string',
            'description' => '',
            'price' => 'required',
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                        'product_id' => 'required|integer|exists:products,id',
                    ] + $rules;
            // case 'PATCH':
            case 'DELETE':
                return [
                    'product_id' => 'required|integer|exists:products,id'
                ];
        }
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        switch ($this->getMethod())
        {
             case 'PUT':
                 $data['product_id'] = $this->route('id');
            // case 'PATCH':
            case 'DELETE':
                $data['product_id'] = $this->route('id');
        }
        return $data;
    }
}
