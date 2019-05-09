<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createnvRequest extends FormRequest
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
        $rules= [
            //
            'name' => 'required',
        ];
        $photos = count($this->input('pictures'));
        foreach(range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:4000';
        }
        return $rules;
    }
}
