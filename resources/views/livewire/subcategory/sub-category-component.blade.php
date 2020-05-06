<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.subcategory.update')
    @else
        @include('livewire.subcategory.create')
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Subcategory Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $count = 1;
            ?>
            @foreach ($subcategories as $subcategorie)
                <tr>
                    <th> {{ $count++ }}</th>
                    <td>{{ $subcategorie->name }}</td>
                    <td>{{ $subcategorie->category->name }}</td>
                    <td>
                        <button wire:click="edit({{$subcategorie->id}})" class="btn btn-warning">Edit</button>
                        <button wire:click="destroy({{$subcategorie->id}})" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete this Subcategory?')" >Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
