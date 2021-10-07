<div class="form-group">
    @foreach ($product_variations as $variation)
        <div class="col-sm-12">
            <label for="variations" class="col-sm-5">
                {{ $variation['name'] }}
            </label>
            <a href="#" id="variations" wire:click.prevent="deleteVariation({{ $variation['id'] }})">Delete</a>
        </div>
    @endforeach
</div>
