<div class="subcategory-filter__right">
    <div class="form__group">
        <label for="number">Sort by</label>
        <div class="select">
            <select class="filter_by" id="filter_by" required name="filter_by">
                <option>Sort by popularity</option>
                <option>Sort by price: low to high</option>
                <option>Sort by price: high to low</option>
                <option>Sort by average rating</option>
            </select>
        </div>
    </div>
    <div class="subcategory-filter__right-inner">

        @foreach($categoryProducts as $product)
            @include('layout.front.product._product', ['roduct' => $product])
        @endforeach

    </div>

    {{ $categoryProducts->onEachSide(2)->appends($_GET)->links('pagination::plius') }}
</div>