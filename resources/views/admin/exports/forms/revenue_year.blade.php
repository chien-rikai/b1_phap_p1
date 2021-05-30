<table>
    <thead>
        <tr>
            <th>{{ __('common.month') }}</th>
            <th>{{ __('common.revenue') }}</th>
        </tr>
    </thead>
    <tbody>
        @if (!blank($revenue))
            @foreach ($revenue as $key => $item)
                <tr>
                    <td>{{ __('common.'.config('global.key_trans_month.'.$key)) }}</td>
                    <td>{{ formatCurrencyFrontEnd($item, ".", ","). " vnđ" }}
                </tr>
            @endforeach
        @endif
    </tbody>
</table>