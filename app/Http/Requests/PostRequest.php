<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'forum_id' => 'required|exists:forums,id', // con esto garantizamos que exista el “id” dentro de la tabla “forums”
            'title' => 'required|unique:posts|max:100',
            'description' => 'required',
        ];
    }
}
