<?php

namespace App\Http\Livewire;

use App\Models\Value;
use App\Models\Variation;
use App\Models\Product;
use Livewire\Component;

class Attributes extends Component
{
    public $product_variations;
    public $productId;
    protected $listeners = ['refreshComponent' => 'render'];

    public function render()
    {
        // dd($this->selectedVariation);
        return view('livewire.attributes');
    }
    public function deleteVariation($variationId)
    {
        $product = Product::find($this->productId);
        $product->variation()->detach($variationId);

        $this->emit('refreshComponent');
    }
}