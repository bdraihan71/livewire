<form wire:submit.prevent="store" class="mb-3">
    <div class="form-group">
        <label for="exampleInputEmail1">Category Name</label>
        <input type="text" class="form-control"  placeholder="Enter Category Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>