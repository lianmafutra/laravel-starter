<?php

namespace App\Http\Requests;

use App\Utils\DateUtils;
use Illuminate\Foundation\Http\FormRequest;

class SampleCrudRequest extends FormRequest
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

      // dd(request()->all());
      return [
         'title'             => 'required|min:10|max:50|string',
         'desc'              => 'required|min:10|max:50|string',
         'category_id'       => 'required',
         'category_multi_id' => 'required',
         'date_publisher'    => 'required|date',
         'check'             => 'required',
         'radio'             => 'required',
         'time'              => 'required',
         'price'             => 'required',
         'password'          => 'required',
         'contact'           => 'required',
         'start_date'        => 'required|date',
         'month'             => 'required|string',
         'days'              => 'required|string',
         'end_date'          => 'required|date',
         'date_range'        => 'required|date',
         'date_range_start'  => 'required|date',
         'date_range_end'    => 'required|date',
         'file_cover'        => 'required|file',
         'summernote'        => 'required',
      ];
   }

   protected function prepareForValidation(): void
   {
      $this->merge([
         'category_multi_id' => json_encode($this->category_multi_id),
         'date_range_start'  => DateUtils::rangeDate($this->date_range)->get('start_date'),
         'date_range_end'    => DateUtils::rangeDate($this->date_range)->get('end_date'),
      ]);
   }
}
