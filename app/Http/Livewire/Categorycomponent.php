<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;

class Categorycomponent extends Component
{
    public $name;
    public $selected_id ;
    public $updateMode = false;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.category.categorycomponent', compact('categories'));
    }

    public function resetInput()
    {
        $this->name = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $this->name,
        ]);

        $this->resetInput();
        session()->flash('message', 'Category successfully Created.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $category->name;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $category = Category::findOrFail($this->selected_id );
        $category->update([
            'name' => $this->name,
        ]);

        $this->resetInput();
        $this->updateMode = false;
        session()->flash('message', 'Category successfully Updated.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('message', 'Category successfully Deleted.');
    }
}
