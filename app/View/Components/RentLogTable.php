<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RentLogTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $rentLogsData;
    public function __construct($rentLogParams)
    {
        $this->rentLogsData = $rentLogParams;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rent-log-table');
    }
}
