@if(Session::has('error'))
    <script>
        $(document).ready(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                icon: 'error',
                title: "{{Session::get('error')}}",
            }).show();
        });
    </script>
@endif
