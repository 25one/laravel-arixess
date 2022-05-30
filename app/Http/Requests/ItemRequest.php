<?php

namespace App\Http\Requests;

class ItemRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $rules = [
            'subject' => 'required',
            'message' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'file' => 'bail|max:10000'
        ];
    }
}
