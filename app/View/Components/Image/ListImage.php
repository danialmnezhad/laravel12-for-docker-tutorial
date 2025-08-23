<?php

namespace App\View\Components\Image;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Image;

class ListImage extends Component
{
    /**
     * Create a new component instance.
     */
    public Image $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image.list-image');
    }
}
