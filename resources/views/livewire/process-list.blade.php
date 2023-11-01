<div>
    @foreach ($processes as $process)
        <livewire:process-view :process="$process" :key="$process->id" />
    @endforeach
</div>
