<?php

namespace App\Http\Requests\Category;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{

    protected function prepareForValidation()
    {
         
    }

    // static public function myRules(){
       
    //     return [
    //         "title" => 'required|min:5|max:500',
    //         //"slug" =>  'required|min:5|max:500|unique:posts',
    //         "content" => 'required|min:7',
    //         "category_id" => 'required',
    //         "description" => 'required|min:7',
    //         "posted" => 'required'
    //     ];
    // }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $response = new Response($validator->errors(), 422);
            throw new ValidationException($validator, $response);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
                    "title" => 'required|min:5|max:500',
                    //Indica que el slug va a ser igual al del post que se le indique
                    "slug" =>  'required|min:5|max:500|unique:categories,slug,' .$this->route("category")->id
                ];
    }
}
