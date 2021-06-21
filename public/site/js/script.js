
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
                alert("Sản phẩm đã được thêm vào giỏ hàng !");
            }
        },

        error: function (error) {
            alert("Có lỗi xảy ra");
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
            alert("Có lỗi xảy ra");
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
            alert("Có lỗi xảy ra");
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

