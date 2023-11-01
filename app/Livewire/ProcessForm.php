<?php

namespace App\Livewire;

use App\Models\Process;
use Livewire\Component;
use Livewire\Attributes\Rule;

class ProcessForm extends Component
{

    #[Rule('required')]
    public string $name;

    #[Rule('required')]
    public string $command;

    public function store()
    {
        $this->validate();

        Process::create([
            "name" => $this->name,
            "command" => $this->command,
        ]);

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.process-form');
    }
}
