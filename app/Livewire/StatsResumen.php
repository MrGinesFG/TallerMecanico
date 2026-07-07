<?php

namespace App\Livewire;

use Livewire\Component;

class StatsResumen extends Component
{
    public $pendientes = 0;
    public $enProceso = 0;
    public $terminadas = 0;
    public $total = 0;

    public function render()
    {
        return view('livewire.stats-resumen');
    }
}