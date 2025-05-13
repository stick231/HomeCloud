<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class fileSize extends Component
{
    public $fileSize;
    public $checkBlock;

    /**
     * Create a new component instance.
     */
    public function __construct($fileSize, $checkBlock)
    {
        $this->fileSize = $fileSize;
        $this->checkBlock = $checkBlock;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if($this->checkBlock === false){
            return view('components.file-size', [
                'formattedFileSize' => $this->formatFileSize($this->fileSize),
            ]);   
        }else{
            return view('components.size-formation', [
                'formattedFileSize' => $this->formatFileSize($this->fileSize),
            ]);   
        }
    }

    public function formatFileSize($fileSize){
        if ($fileSize >= 1073741824) {
            return round($fileSize / 1073741824, 2) . ' GB';
        } elseif ($fileSize >= 1048576) {
            return round($fileSize / 1048576, 2) . ' MB';
        } elseif ($fileSize >= 1024) {
            return round($fileSize / 1024, 2) . ' KB';
        } else {
            return $fileSize . ' bytes';
        }
    }
}
