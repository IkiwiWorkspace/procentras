<div class="col-lg-3 mb-4">
    <h1 class="mt-4">Filtrai</h1>

    <h3 class="mt-2">Kaina</h3>
    @foreach($prices as $index => $price)
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="price{{ $index }}" value="{{ $index }}" wire:model="selected.prices">
            <label class="custom-control-label" for="price{{ $index }}">
                {{ $price['name'] }} ({{ $price['products_count'] }})
            </label>
        </div>
    @endforeach

    <h3 class="mt-2">Kategorijos</h3>
    @foreach($categories as $index => $category)
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="category{{ $index }}" value="{{ $category->id }}" wire:model="selected.categories">
            <label class="custom-control-label" for="category{{ $index }}">
                {{ $category['name'] }} ({{ $category['products_count'] }})
            </label>
        </div>
    @endforeach
</div>
