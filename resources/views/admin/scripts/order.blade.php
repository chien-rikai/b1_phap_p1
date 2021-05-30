<script>
    $('#order-status').on('click', function (e) {
        if (!confirm("{{ __('message.alert_forward_status') }}")) {
            return false;
        }

        e.preventDefault();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            cache: false,
            url: "{{ route('forward.status', ['id' => $order->id]) }}",

            success: function (res) {
                if (res.success) {
                    $("#info-user").empty();
                    $("#info-user").append(res.html);

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