<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileIcon extends Component
{
    public string $filename;

    /**
     * Create a new component instance.
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.file-icon', [
            'pathIcon' => $this->pathIcon(),
        ]);
    }

    public function pathIcon() : string
    {
        $ext = strtolower(pathinfo($this->filename, PATHINFO_EXTENSION));
        $path = "icons/$ext.png";
    
        // Если такой файл не существует — использовать default.png
        if (!file_exists(public_path($path))) {
            $path = "icons/default.png";
        }
    
        return asset($path);
    }
}
