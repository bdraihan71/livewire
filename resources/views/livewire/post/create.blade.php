<form wire:submit.prevent="store" class="mb-3">
    <div class="form-group">
        <label for="exampleInputEmail1">Post Title</label>
        <input type="text" class="form-control"  placeholder="Enter Post Title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
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

    <div class="form-group">
        <label for="exampleFormControlSelect1">Subcategory select</label>
        <select class="form-control" wire:model="subcategory_id">
            <option value="">Please Select Subategory</option>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endforeach
        </select>
        @error('subcategory_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Post Body</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="body"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>