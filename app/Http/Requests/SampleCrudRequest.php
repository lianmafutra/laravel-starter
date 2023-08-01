<?php

namespace App\Http\Requests;

use App\Utils\DateUtils;
use App\Utils\Rupiah;
use Illuminate\Foundation\Http\FormRequest;

class SampleCrudRequest extends FormRequest
{

   public function authorize()
   {
      return true;
   }

   protected function prepareForValidation(): void
   {

      $this->merge([
         'category_multi_id' => json_encode($this->category_multi_id),
         'date_range_start'  => DateUtils::rangeDate($this->date_range)->get('start_date'),
         'date_range_end'    => DateUtils::rangeDate($this->date_range)->get('end_date'),
         'date_publisher'    => DateUtils::format($this->date_publisher),
         'start_date'        => DateUtils::format($this->start_date),
         'end_date'          => DateUtils::format($this->end_date),
         'summernote'        => clean($this->summernote),
         'price'             => Rupiah::clean($this->price),
         'contact'           => trim(preg_replace('/[^0-9]/', '', $this->contact)),
      ]);
   }

   public function rules()
   {
      return [
         'title'             => 'required|min:10|max:50|string',
         'desc'              => 'required|min:10|max:50|string',
         'category_id'       => 'required|string',
         'category_multi_id' => 'required',
         'check'             => 'required',
         'radio'             => 'required',
         'time'              => 'required|date_format:H:i',
         'price'             => 'required|numeric',
         'password'          => 'required|string',
         'contact'           => 'required|string|numeric',
         'month'             => 'required|string',
         'days'              => 'required|string',
         'start_date'        => 'required|date_format:Y-m-d',
         'end_date'          => 'required|after:start_date|date_format:Y-m-d',
         'date_publisher'    => 'required|date_format:Y-m-d',
         'date_range'        => 'required|string',
         'date_range_start'  => 'required|date_format:Y-m-d',
         'date_range_end'    => 'required|date_format:Y-m-d',
         'file_cover'        => 'required|file|mimes:jpeg,jpg,png|max:2048',
         // 'file_cover_multi.*'  => 'required|file|mimes:jpeg,jpg,png|max:2048',
         'summernote'        => 'required|string|max:500',
      ];
   }






  

  
}
