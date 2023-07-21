<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratMasukRequest extends FormRequest
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

    
 
        if($this->request->get('surat_masuk_id')){
       
         return [
            'no_surat' => 'required|min:1|unique:surat_masuk,id,'.$this->surat_masuk_id,
         ];
      }else{
         return [
            'no_surat' => 'required|min:1|unique:surat_masuk',
          
         ];
      }
    }
}
