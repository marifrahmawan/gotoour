<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TravelPackageRequest extends FormRequest
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
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'nation' => 'required|max:255',
            'continent' => 'required|max:255',
            'about' => 'required',
            'featuredEvent' => 'required|max:255',
            'language' => 'required|max:255',
            'food' => 'required|max:255',
            'departureDate' => 'required|date',
            'arrivalDate' => 'required|date',
            'type' => 'required|max:255',
            'price' => 'required',
        ];
    }
}
