<?php

namespace App\View\Components;

use Illuminate\View\Component;

class select2_multi extends Component
{
   public $required;
 

   public $id;

   public $label;

   public $placeholder;

    public function __construct($required, $id, $label, $placeholder='')
    {
    
      $this->required = $required;
    
      $this->id = $id;
      $this->label = $label;
      $this->placeholder = $placeholder;
   }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select2_multi');
    }
}
