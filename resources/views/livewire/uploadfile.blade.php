    <input type="file" wire:model="image">

    @error('image')
        <span class="error">{{ $message }}</span>
    @enderror