<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputNumber extends Component
{
   /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id, $label, $required;
    public $type;
    public $placeholder;

    public function __construct($id, $label, $required= false, $type='text', $placeholder='')
    {
      $this->id = $id;
      $this->label = $label;
      $this->required = $required;
       $this->type = $type;
      $this->placeholder = $placeholder;
   }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-number');
    }
}
