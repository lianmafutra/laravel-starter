<?php

namespace App\Rules;

use App\Utils\LmFile\CleanFilepond;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Support\Facades\Validator;
use RahulHaque\Filepond\Facades\Filepond;

class FilepondRule implements Rule, DataAwareRule, ValidatorAwareRule
{
   protected $validator;
   protected $data;
   protected $rules;
   protected $messages;

   /**
    * Create a new rule instance.
    *
    * @param  string|array  $rules
    */
   public function __construct($rules)
   {
      $this->rules = $rules;
   }

   /**
    * Set the performing validator.
    *
    * @param  \Illuminate\Contracts\Validation\Validator  $validator
    * @return $this
    */
   public function setValidator($validator)
   {
      $this->validator = $validator;

      return $this;
   }

   /**
    * Set the data under validation.
    *
    * @param  array  $data
    * @return $this
    */
   public function setData($data)
   {
      $this->data = $data;

      return $this;
   }

   /**
    * Determine if the validation rule passes.
    *
    * @param  string  $attribute
    * @param  mixed  $value
    * @return bool
    */
   public function passes($attribute, $value)
   {

   

      if (CleanFilepond::run($value)) {
         $field = explode('.', $attribute)[0];
       
         if (is_array($this->data[$field])) {
            foreach ($this->data[$field] as $key => $item) {
               try {
                  decrypt($item);
               } catch (\Throwable $th) {
                  unset($this->data[$field][$key]);
               }
            }
         }
      
         $this->data[$field] = Filepond::field($this->data[$field])->getFile();

         $validator = Validator::make(
            $this->data,
            [$attribute => $this->rules],
            $this->validator->customMessages,
            $this->validator->customAttributes
         );
         $this->messages = $validator->errors()->all();
         return !$validator->fails();
      } else {
         return true;
      }
   }

   /**
    * Get the validation error message.
    *
    * @return array
    */
   public function message()
   {

      return $this->messages;
   }
}
