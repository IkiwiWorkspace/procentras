<?php

namespace App\Http\Livewire;

use App\Services\PriceService;
use Livewire\Component;
use App\Models\Category;

class Sidebar extends Component
{
    public $selected = [
        'prices' => [],
        'categories' => [],
    ];

    public function render(PriceService $priceService)
    {
        $prices = $priceService->getPrices(
            [],
            $this->selected['prices'],
            $this->selected['categories'],
        );
        $categories = Category::where('name', '!=', 'Internetinės paslaugos')
        ->where('name', '!=', 'Paslaugos atliekamos salone')->withCount(['products' => function ($query) {
            $query->withFilters(
                [],
                $this->selected['prices'],
                $this->selected['categories'],
            );
        }])->get();

        return view('livewire.sidebar', compact('prices', 'categories'));
    }

    public function updatedSelected()
    {
        $this->emit('updatedSidebar', $this->selected);
    }
}
