<?php

namespace App\Http\Livewire;

use App\Category;
use App\Subcategory;
use Livewire\Component;

class SubCategoryComponent extends Component
{
    public $name;
    public $category_id;
    public $selected_id ;
    public $updateMode = false;

    public function render()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('livewire.subcategory.sub-category-component', compact('subcategories','categories'));
    }

    public function resetInput()
    {
        $this->name = null;
        $this->category_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        Subcategory::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
        ]);

        $this->resetInput();
        session()->flash('message', 'Subcategory successfully Created.');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $subcategory->name;
        $this->category_id = $subcategory->category_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        $subcategory = Subcategory::findOrFail($this->selected_id );
        $subcategory->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
        ]);

        $this->resetInput();
        $this->updateMode = false;
        session()->flash('message', 'Subcategory successfully Updated.');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        session()->flash('message', 'Subcategory successfully Deleted.');
    }
}
