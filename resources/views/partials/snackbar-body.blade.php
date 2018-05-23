<div id="snackbar">{{ $msg or ""}}</div>

@if (isset($msg))
        <script>
                snackbar();
        </script>
@endif

