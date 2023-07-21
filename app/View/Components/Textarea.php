<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
   public $id;

   public $label;

   public $hint;

   public $required;

   public $value;

   /**
    * Create a new component instance.
    *
    * @return void
    */
   public function __construct($id, $label, $hint, $required, $value="")
   {
      //
      $this->id = $id;
      $this->label = $label;
      $this->hint = $hint;
      $this->required = $required;
      $this->value = $value;
   }

   /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\Contracts\View\View|\Closure|string
    */
   public function render()
   {
      return view('components.textarea');
   }
}
