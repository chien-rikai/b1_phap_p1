<script>
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
</script>