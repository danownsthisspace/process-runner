<div>
    <form wire:submit="store">
        <input type="text" wire:model="name" placeholder="name" />
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" wire:model="command" placeholder="command" />
        @error('command')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">➕</button>
    </form>
</div>
