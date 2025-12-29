<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.coba')]
class Coba extends Component
{
    public $ayam = 'yuda';
    public $angka;
    public function render()
    {
        return view('livewire.coba');
    }
}
