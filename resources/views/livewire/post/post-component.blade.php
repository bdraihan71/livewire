<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.post.update')
    @else
        @include('livewire.post.create')
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Post Title</th>
                <th scope="col">Subcategory Name</th>
                <th scope="col">Post Body</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $count = 1;
            ?>
            @foreach ($posts as $post)
                <tr>
                    <th> {{ $count++ }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->subCategory->name }}</td>
                    <td>{{ $post->body}}</td>
                    <td>
                        <button wire:click="edit({{$post->id}})" class="btn btn-warning">Edit</button>
                        <button wire:click="destroy({{$post->id}})" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete this Post?')" >Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
