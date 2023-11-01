<?php

namespace App\Livewire;

use App\Models\Process;
use Livewire\Component;

class ProcessList extends Component
{
    public function render()
    {
        return view('livewire.process-list', [
            "processes" => Process::all(),
        ]);
    }
}
