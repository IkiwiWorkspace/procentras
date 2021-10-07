<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    protected $selected = [
        'prices' => [],
        'categories' => [],
    ];

    protected $listeners = ['updatedSidebar' => 'setSelected'];

    public function render()
    {
        $products = Product::withFilters(
            $this->selected['prices'],
            $this->selected['categories']
        )->whereHas('category', function($query) {
            return $query->where('name', '!=', 'Internetinės paslaugos');
        })->whereHas('category', function($query) {
            return $query->where('name', '!=', 'Paslaugos atliekamos salone');
        });
        
        $products = $products->paginate(12);
        
        return view('livewire.products', compact('products'));
    }

    public function setSelected($selected)
    {
        $this->selected = $selected;
    }
}
