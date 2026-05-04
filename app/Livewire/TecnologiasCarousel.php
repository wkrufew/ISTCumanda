<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class TecnologiasCarousel extends Component
{
    public $tecnologys = [];

    public function loadTecnologys()
    {
        $this->tecnologys = Course::where('status', 2)
            ->take(10)
            ->get();

            //dd($this->tecnologys);
        $this->dispatch('swiper');
    }
    public function render()
    {
        return view('livewire.tecnologias-carousel');
    }
}
