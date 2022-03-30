<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'parent_id' => 'required',
            'name' => 'required|string',
        ];

        switch ($this->getMethod()) {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                        'category_id' => 'required|integer|exists:categories,id',
                    ] + $rules;
            // case 'PATCH':
            case 'DELETE':
                return [
                    'category_id' => 'required|integer|exists:categories,id'
                ];
        }
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        switch ($this->getMethod()) {
            case 'PUT':
                $data['category_id'] = $this->route('id');
            // case 'PATCH':
            case 'DELETE':
                $data['category_id'] = $this->route('id');
        }
        return $data;
    }
}
