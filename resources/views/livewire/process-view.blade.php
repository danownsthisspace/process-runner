<div x-data="{ open: false }">
    <p>
        {{ $process->name }} {{ $process->isRunning() ? '🚀' : '' }}
        <button wire:click="execute">Run</button>

        @if ($process->isRunning())
            <button wire:click="kill">Kill</button>
        @endif

        <button @click="open = true" wire:click="refreshOutput" x-text="open ? 'Hide output': 'Show output' "></button>

    <div x-show="open" @click.outside="open = false" wire:poll.visible="refreshOutput">
        <pre>{!! $output !!}</pre>
    </div>
    </p>
</div>
