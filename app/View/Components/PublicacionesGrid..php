<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PublicacionesGrid extends Component
{
    public $publicaciones;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $publicaciones
     * @return void
     */
    public function __construct($publicaciones)
    {
        $this->publicaciones = $publicaciones;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.publicaciones-grid');
    }
}
