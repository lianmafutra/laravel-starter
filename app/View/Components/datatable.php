<?php

namespace App\View\Components;

use Illuminate\View\Component;

class datatable extends Component
{
   public $id;

   public $th;
   public $class;



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $th=[], $class="")
    {
        //
       $this->id = $id;
      $this->th = $th;
      $this->class = $class;
   }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datatable');
    }
}
