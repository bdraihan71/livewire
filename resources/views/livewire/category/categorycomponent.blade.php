<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.category.update')
    @else
        @include('livewire.category.create')
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $count = 1;
            ?>
            @foreach ($categories as $category)
                <tr>
                    <th> {{ $count++ }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <button wire:click="edit({{$category->id}})" class="btn btn-warning">Edit</button>
                        <button wire:click="destroy({{$category->id}})" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete this Category?')" >Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
