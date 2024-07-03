<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
    new WOW().init();
    @if (session('error'))
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ session('error') }}",
        });
    @endif

    @if (session('success'))
        Swal.fire({
            icon: "success",
            title: "Success...",
            text: "{{ session('success') }}",
        });
    @endif
    
</script>
