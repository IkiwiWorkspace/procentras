<?php

namespace App\Services;

use App\Models\Product;

class PriceService
{
    private $prices;
    private $categories;

    public function getPrices($prices, $categories)
    {
        $this->prices = $prices;
        $this->categories = $categories;
        $formattedPrices = [];

        foreach(Product::PRICES as $index => $name) {
            $formattedPrices[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index)
            ];
        }

        return $formattedPrices;
    }

    private function getProductCount($index)
    {
        return Product::withFilters($this->prices, $this->categories)
            ->when($index == 0, function ($query) {
                $query->where('price', '<', '50');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('price', ['50', '100']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('price', ['100', '500']);
            })
            ->when($index == 3, function ($query) {
                $query->where('price', '>', '500');
            })->whereHas('category', function($query) {
                return $query->where('name', '!=', 'Internetinės paslaugos');
            })->whereHas('category', function($query) {
                return $query->where('name', '!=', 'Paslaugos atliekamos salone');
            })->count();
    }
}
