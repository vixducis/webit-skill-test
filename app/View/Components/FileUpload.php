<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class FileUpload extends Component
{
    public string $inputId;
    public string $labelId;

    /**
     * Create a new component instance.
     * @param string $name The name that will be assigned to the file input element.
     * @param string $text The text that will be displayed in the element.
     *
     * @return void
     */
    public function __construct(
        public string $name,
        public string $text
    ) {
        $id = Str::random();
        $this->inputId = 'file-upload-'.$id;
        $this->labelId = 'file-upload-label-'.$id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file-upload');
    }
}
