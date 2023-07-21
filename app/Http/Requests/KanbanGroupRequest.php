<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KanbanGroupRequest extends FormRequest
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
    
      if ($this->request->get('id')) {
         return [
            // 'nama' => 'required|min:5|unique:kanban_group,id,' . $this->id,
            'nama' => 'required|min:5',
            'desc' => 'required|min:5',
         ];
      } else {
         return [
            'nama' => 'required|min:5',

            // 'nama' => 'required|min:5|unique:kanban_group',
            'desc' => 'required|min:5',
         ];
      }
   }
}
