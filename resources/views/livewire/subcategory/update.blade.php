<form wire:submit.prevent="update" class="mb-3">
    <input type="hidden" wire:model="id">
    <div class="form-group">
        <label for="exampleInputEmail1">Subcategory Name</label>
        <input type="text" class="form-control"  placeholder="Enter Category Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Category select</label>
        <select class="form-control" wire:model="category_id">
            <option value="">Please Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>