@if(Session::has('success'))
    <script>
        $(document).ready(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                icon: 'success',
                title: "{{Session::get('success')}}",
            }).show();
        });
    </script>
@endif
