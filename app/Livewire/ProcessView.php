<?php

namespace App\Livewire;

use App\Models\Process;
use Livewire\Component;

class ProcessView extends Component
{
    public Process $process;
    public string $output;

    public function execute()
    {
        $this->process->execute();
    }

    public function kill()
    {
        $this->process->kill();
    }

    public function refreshOutput()
    {
        $this->output = implode('<br />', array_slice($this->process->output(), -10));
    }

    public function render()
    {
        return view('livewire.process-view');
    }
}
