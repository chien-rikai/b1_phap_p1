<script>
    var areaChartData = {
        labels  :  [
            "{{ __('common.'.config('global.key_trans_month.1')) }}",
            "{{ __('common.'.config('global.key_trans_month.2')) }}",
            "{{ __('common.'.config('global.key_trans_month.3')) }}",
            "{{ __('common.'.config('global.key_trans_month.4')) }}",
            "{{ __('common.'.config('global.key_trans_month.5')) }}",
            "{{ __('common.'.config('global.key_trans_month.6')) }}",
            "{{ __('common.'.config('global.key_trans_month.7')) }}",
            "{{ __('common.'.config('global.key_trans_month.8')) }}",
            "{{ __('common.'.config('global.key_trans_month.9')) }}",
            "{{ __('common.'.config('global.key_trans_month.10')) }}",
            "{{ __('common.'.config('global.key_trans_month.11')) }}",
            "{{ __('common.'.config('global.key_trans_month.12')) }}",

        ],
        datasets: [
            {
            label               : 'Digital Goods',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [
                "{{ $revenueEachMonth[1] ?? 0 }}",
                "{{ $revenueEachMonth[2] ?? 0 }}",
                "{{ $revenueEachMonth[3] ?? 0 }}",
                "{{ $revenueEachMonth[4] ?? 0 }}",
                "{{ $revenueEachMonth[5] ?? 0 }}",
                "{{ $revenueEachMonth[6] ?? 0 }}",
                "{{ $revenueEachMonth[7] ?? 0 }}",
                "{{ $revenueEachMonth[8] ?? 0 }}",
                "{{ $revenueEachMonth[9] ?? 0 }}",
                "{{ $revenueEachMonth[10] ?? 0 }}",
                "{{ $revenueEachMonth[11] ?? 0 }}",
                "{{ $revenueEachMonth[12] ?? 0 }}",
            ]
            },
        ]
    }

    var donutData  = {
        labels: [
            "{{ __('common.'.config('global.status_order.0')) }}",
            "{{ __('common.'.config('global.status_order.1')) }}",
            "{{ __('common.'.config('global.status_order.2')) }}",
            "{{ __('common.'.config('global.status_order.3')) }}",
            "{{ __('common.'.config('global.status_order.4')) }}",
        ],
        datasets: [
            {
            data: [
                "{{ $statusOrders[0] ?? 0 }}",
                "{{ $statusOrders[1] ?? 0 }}",
                "{{ $statusOrders[2] ?? 0 }}",
                "{{ $statusOrders[3] ?? 0 }}",
                "{{ $statusOrders[4] ?? 0 }}",
            ],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
            }
        ]
    }

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = donutData;
        var pieOptions     = {
            maintainAspectRatio : false,
            responsive : true,
        }

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    })
    
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
</script>