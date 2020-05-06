<?php

namespace App\Http\Livewire;

use App\Category;
use App\Post;
use App\Subcategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostComponent extends Component
{
    public $title;
    public $body;
    public $user_id;
    public $category_id;
    public $subcategory_id;
    public $selected_id ;
    public $updateMode = false;

    public function render()
    {
        $posts = Post::all();
        $subcategories = Subcategory::where('category_id', $this->category_id)->get();
        $categories = Category::all();
        return view('livewire.post.post-component', compact('subcategories','posts','categories'));
    }

    public function resetInput()
    {
        $this->title = null;
        $this->body = null;
        $this->user_id = null;
        $this->subcategory_id = null;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ]);

        Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => Auth::user()->id,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
        ]);

        $this->resetInput();
        session()->flash('message', 'Post successfully Created.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->selected_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->category_id = $post->category_id;
        $this->subcategory_id = $post->subcategory_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ]);

        $post = Post::findOrFail($this->selected_id );
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
            'user_id' => Auth::user()->id,
        ]);

        $this->resetInput();
        $this->updateMode = false;
        session()->flash('message', 'Post successfully Updated.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        session()->flash('message', 'Post successfully Deleted.');
    }
}
