<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'image', 'builder_id'];

    const PRICES = [
        'Mažiau nei 50',
        'Nuo 50 iki 100',
        'Nuo 100 iki 500',
        'Daugiau nei 500',
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function builder()
    {
        return $this->belongsTo(Builder::class);
    }
    public function variation()
    {
        return $this->belongsToMany(Variation::class);
    }
    public function scopeWithFilters($query, $prices, $categories)
    {
        return $query->when(count($categories), function ($query) use ($categories) {
                $query->whereHas('category', function (Builder $query) use ($categories) {
                    $query->whereIn('category_id', $categories);
                });
            })->when(count($prices), function ($query) use ($prices){
                $query->where(function ($query) use ($prices) {
                    $query->when(in_array(0, $prices), function ($query) {
                        $query->orWhere('price', '<', '50');
                    })
                        ->when(in_array(1, $prices), function ($query) {
                            $query->orWhereBetween('price', ['50', '100']);
                        })
                        ->when(in_array(2, $prices), function ($query) {
                            $query->orWhereBetween('price', ['100', '500']);
                        })
                        ->when(in_array(3, $prices), function ($query) {
                            $query->orWhere('price', '>', '500');
                        });
                });
            });
    }
}