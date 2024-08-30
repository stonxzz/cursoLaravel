<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //El metodo merge agrega el campo indicado al array indicado, y el metodo prepareForValidation
        //Prepara los datos antes de aplicar las validaciones.
        $this->merge([
            // 'slug' => Str::slug($this->title),
            // 'slug'=> Str::of($this->title)->slug()->append("-adicional")
            'slug' => str($this->title)->slug()->append(".com")
        ]);  
    }

    static public function myRules(){
        return [
            "title" => 'required|min:5|max:500',
            "slug" =>  'required|min:5|max:500|unique:categories'
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return $this->myRules();
    }
}
