<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $(".btn-delete").on("click", function () {
        if (!confirm("{{ __('message.alert_delete') }}")) {
            return false;
        }
    });

    $(".btn-force-delete").on("click", function () {
        if (!confirm("{{ __('message.alert_force_delete') }}")) {
            return false;
        }
    });

    $(".btn-restore").on("click", function () {
        if (!confirm("{{ __('message.alert_restore') }}")) {
            return false;
        }
    });

    $(".status-display-product").on('change', function () {
        let id = $(this).data("product-id");

        $.ajax({
            type: 'GET',
            dataType: 'json',
            cache: false,
            url: "/admin/change/product/status/" + id,

            success: function (res) {
                if (res > 0) {
                    Toast.fire({
                        icon: 'success',
                        title: "{{ __('message.success_change_status') }}",
                    }).show();
                }
            },

            error: function (error) {
                alert("{{ __('message.something_went_wrong') }}");
            }
        });
    });

    $(".status-display-category").on('change', function () {

        if (!confirm("{{ __('message.alert_change_status_category') }}")) {
            return false;
        }

        let id = $(this).data("category-id");

        $.ajax({
            type: 'GET',
            dataType: 'json',
            cache: false,
            url: "/admin/change/category/status/" + id,

            success: function (res) {
                if (res > 0) {
                    Toast.fire({
                        icon: 'success',
                        title: "{{ __('message.success_change_status') }}",
                    }).show();
                }
            },

            error: function (error) {
                alert("{{ __('message.something_went_wrong') }}");
            }
        });
    });
</script>