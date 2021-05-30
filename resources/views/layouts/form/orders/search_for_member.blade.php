<form action="{{ route('members.history', $member->id) }}" method="GET">    
    <div class="row">
        {{ loadStatusOrderSelected([
            'title' => __('common.order_status'),
            'col' => 4,
        ]) }}
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="form-group float-right">
                <button type="submit" class="btn btn-primary">{{ __('common.search') }}</button>
            </div>
        </div>
    </div>
</form>