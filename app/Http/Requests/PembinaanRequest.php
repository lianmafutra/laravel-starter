<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembinaanRequest extends FormRequest
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

    
      if ($this->request->get('pembinaan_id')) {
         return [
            // 'nama' => 'required|min:5|unique:bidang,id,' . $this->pembinaan_id,
          
         ];
      } else {
         return [
            // 'nama' => 'required|min:5|unique:bidang',
         
         ];
      }
   }
}
