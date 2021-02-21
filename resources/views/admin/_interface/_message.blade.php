

@if(Session::has('success'))

<script>
    toastr.success("{{ Session::get('success') }}");
</script>

@endif

@if(Session::has('info'))

<script>
    toastr.info("{{ Session::get('success') }}");
</script>

@endif

@if(Session::has('error'))

<script>
    toastr.error("{{ Session::get('error') }}");
</script>

@endif

@if (count($errors)>0)

    @foreach ($errors->all() as $error)

    <script>
        toastr.error(" {{ $error }} ");
    </script>

	@endforeach

@endif



