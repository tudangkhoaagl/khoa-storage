<?php

namespace Khoa\KhoaStorage\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetImageStorageImageRequest extends FormRequest
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
            'file_url' => 'string|max:200',
        ];
    }
}
