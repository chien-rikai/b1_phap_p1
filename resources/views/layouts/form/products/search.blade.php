<form action="{{ route('products.index') }}" method="GET">    
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">{{ __('common.name', ['model' => __('common.product')]) }}</label>
                <input type="text" class="form-control"
                    name="name" value="{{ old('name') }}" id="name">
            </div>
        </div>

        {{ loadCategoriesSelected(['categories' => $categories, 'col' => 4]) }}

        {{ loadSortSelected(['title' => __('common.price'), 'name' => 'sort_price']) }}
    </div>

    <div class="row">
        {{ loadSortSelected(['title' => __('common.view'), 'name' => 'sort_view']) }}

        {{ loadSortSelected(['title' => __('common.star_rating'), 'name' => 'sort_score_star_rating']) }}
        
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="form-group float-right">
                <button type="submit" class="btn btn-primary">{{ __('common.search') }}</button>
            </div>
        </div>
    </div>
</form>