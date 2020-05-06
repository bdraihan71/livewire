<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class Test extends Component
{
    public $name;
    public $number;

   

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'number' => 'required',
        ]);

        Contact::create([
            'name' => $this->name,
            'number' => $this->number,
        ]);

        $this->name = '';
        $this->number = '';
    }

    public function render()
    {
        return view('livewire.test', [
            'contacts' => Contact::all(),
        ]);
    }
}
