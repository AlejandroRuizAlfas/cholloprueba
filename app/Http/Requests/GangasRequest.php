<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GangasRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'category' => 'required',
            'price' => 'required',
            'price_sale' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El títol de la ganga és obligatori.',
            'description.required' => 'La descripció de la ganga és obligatori.',
            'url.required' => 'La imatge de la ganga és obligatori.',
            'category.required' => 'La categoria de la ganga és obligatori.',
            'price.required' => 'El preu normal de la ganga és obligatori.',
            'price_sale.required' => 'El preu rebaixat de la ganga és obligatori.',
        ];
    }
}
