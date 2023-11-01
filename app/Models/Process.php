<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{

    protected $guarded = [];

    public function execute()
    {

        $this->deleteOutput();

        $outputFile = storage_path(Str::uuid());
        $command = $this->command . " > "  . $outputFile . " 2>&1 & echo $!";
        exec($command, $out);

        $this->pid = $out[0];
        $this->output_file = $outputFile;
        $this->save();
    }

    public function isRunning()
    {
        if (!$this->pid) return false;
        exec("ps -p {$this->pid}", $out);
        if (count($out) > 1) return true;
        return false;
    }

    public function deleteOutput()
    {
        if ($this->isRunning()) return;

        if ($this->output_file && file_exists($this->output_file)) {
            unlink($this->output_file);
        }
        $this->output_file = null;
        $this->save();
    }

    public function output()
    {
        if (!$this->output_file) return [];
        return file($this->output_file);
    }

    public function kill()
    {
        if (!$this->pid) return;
        exec("kill {$this->pid}");

        $this->update(['pid' => null]);
    }
}
