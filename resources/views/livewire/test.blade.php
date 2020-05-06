<div>
    <form wire:submit.prevent="submit">
        <input type="text" wire:model="name">
        @error('name') <span class="error">{{ $message }}</span> @enderror
    
        <input type="text" wire:model="number">
        @error('number') <span class="error">{{ $message }}</span> @enderror
    
        <button type="submit" >Save Contact</button>
    </form>

    @foreach ($contacts as $contact)
        <li>Name: {{$contact->name}} Number: {{$contact->number}}</li>
    @endforeach
</div>
