<?php

namespace App\Http\Livewire;

use App\Models\Variation;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $showModal = false;
    public $name = '';

    protected $listeners = ['openModal'];

    protected $rules = [
        'name' => 'required|min:3|unique:variations,name',
    ];
    
    public function render()
    {
        return view('livewire.category-create');
    }

    public function save()
    {
        $this->validate();

        Variation::create([
            'name' => $this->name
        ]);

        $this->reset('name');

        $this->emit('updateVariations');

        $this->closeModal();
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}