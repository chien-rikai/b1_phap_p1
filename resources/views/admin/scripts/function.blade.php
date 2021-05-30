<script>
    $(".status-display-product").on('change', function () {
        let id = $(this).data("product-id");

        $.ajax({
            type: 'GET',
            dataType: 'json',
            cache: false,
            url: "/admin/change/product/status/" + id,

            success: function (res) {
                if (res > 0) {
                    alert("{{ __('message.success_change_status') }}");
                }
            },

            error: function (error) {
                alert("{{ __('message.something_went_wrong') }}");
            }
        });
    });

    $(".status-display-category").on('change', function () {
        let id = $(this).data("category-id");

        $.ajax({
            type: 'GET',
            dataType: 'json',
            cache: false,
            url: "/admin/change/category/status/" + id,

            success: function (res) {
                if (res > 0) {
                    alert("{{ __('message.success_change_status') }}");
                }
            },

            error: function (error) {
                alert("{{ __('message.something_went_wrong') }}");
            }
        });
    });
</script>