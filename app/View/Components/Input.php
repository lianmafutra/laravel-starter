<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
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

    public $info;

   public $name;

    public function __construct($label, $required= false, $type='text', $value='', $action='', $info='', $name="",$id="")
    {
     
    
      $this->label = $label;
      $this->required = $required;
       $this->type = $type;
      $this->value = $value;
      $this->action = $action;
      $this->info = $info;
        $this->id = $id;
      $this->name = $name;
   }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
