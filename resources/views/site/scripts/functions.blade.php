<script>
$(".auth-rating").on('change', function () {
    alert("{{ __('message.alert_auth') }}");
});

$(".rating").on('change', function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        type: 'POST',
        data: {
            id: $("#product-rating").data("product-id"),
            count_rating: $("#product-rating").data("count"),
            score_rating: $("#product-rating").data("score"),
            star: $(this).val(),
        },
        dataType: 'json',
        cache: false,
        url: "{{ route('rating') }}",

        success: function (res) {
            if (res > 0) {
                alert("{{ __('message.thank_for_rating') }}");

                $(".rating").removeAttr('checked');

                $(".rating").each(function (index, value) {
                    if ($(this).val() == res) {
                        $(this).prop("checked", true);
                    }
                });
            }
        },

        error: function (error) {
            alert("{{ __('message.something_went_wrong') }}");
        }
    });
});

$(".add-to-cart").on('click', function (e) {
    e.preventDefault();

    var form = [];
    for (let index = 0; index < ($(this).context.length - 1); index++) {
        form[$($(this).context[index]).attr('name')] = $($(this).context[index]).val();
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        type: 'POST',
        data: {
            id: form.id,
            name: form.name,
            slug: form.slug,
            url_image: form.url_image,
            amount: form.amount,
            price: form.price,
            price_promotion: form.price_promotion,
        },
        dataType: 'json',
        cache: false,
        url: "{{ route('add.to.cart') }}",
        success: function (res) {
            if (res > 0) {
                alert("{{ __('message.cart_success') }}");
            }
        },

        error: function (error) {
            alert("{{ __('message.something_went_wrong') }}");
        }
    });
});

$('.close1').on('click', function (e) {
    var id = $(this).data('id');
    var url = '/ajax/remove-out-cart/'+id;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        type: 'GET',
        data: {
           id: id
        },
        dataType: 'json',
        cache: false,
        url: url,
        success: function (res) {
            if (res > 0) {
                $('#'+id).fadeOut('slow', function () {
                    $('#'+id).remove();
                });
        
                $("#count-products").text($("#count-products").text() - 1);
            }
        },

        error: function (error) {
            alert("{{ __('message.something_went_wrong') }}");
        }
    });
});

$('#update-cart').on('click', function (e) {
    e.preventDefault();

    const cart = new Array();

    $(".amount-update").each(function () {
        cart[$(this).data('id-linked')] = $(this).text();
    });
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
        },
        type: 'POST',
        data: {
            cart
        },
        dataType: 'json',
        cache: false,
        url: "{{ route('update.cart') }}",
        success: function (res) {
            if (res > 0) {
                location.reload();
            }
        },

        error: function (error) {
            alert("{{ __('message.something_went_wrong') }}");
        }
    });
});

$('.value-plus').on('click', function () {
    var divUpd = $(this).parent().find('.value'),
        newVal = parseInt(divUpd.text(), 10) + 1;
    divUpd.text(newVal);
});

$('.value-minus').on('click', function () {
    var divUpd = $(this).parent().find('.value'),
        newVal = parseInt(divUpd.text(), 10) - 1;
    if (newVal >= 1) divUpd.text(newVal);
});


</script>