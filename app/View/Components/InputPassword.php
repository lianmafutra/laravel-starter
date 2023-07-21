<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputPassword extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $id, $label, $required;
     public $action;
     public $type;
     public $value;
     public $placeholder;

     public function __construct($id, $label, $required= false, $type='text', $value='', $action='',
      $placeholder='')
     {
       $this->id = $id;
       $this->label = $label;
       $this->required = $required;
        $this->type = $type;
       $this->value = $value;
       $this->action = $action;
       $this->placeholder = $placeholder;
   }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-password');
    }
}
