<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableModal extends Component
{
    public $route;
    public $id;
    public $modalTitle;
    public $modalText;
    public $modalMethod;
    public $modalType;
    public $buttonText;
    public $buttonIcon;
    public $buttonColor;

    public function __construct(
        $route,
        $id = null,
        $modalTitle = null,
        $modalText = null,
        $modalMethod = null,
        $modalType = null,
        $buttonText = null,
        $buttonIcon = null,
        $buttonColor = null,
    ) {
        $this->route = $route;
        $this->id = $id;
        $this->modalTitle = $modalTitle;
        $this->modalText = $modalText;
        $this->modalMethod = $modalMethod;
        $this->modalType = $modalType;
        $this->buttonText = $buttonText;
        $this->buttonIcon = $buttonIcon;
        $this->buttonIcon = $buttonIcon;
        $this->buttonColor = $buttonColor;
    }

    public function render()
    {
        return view('components.table-modal');
    }
}
