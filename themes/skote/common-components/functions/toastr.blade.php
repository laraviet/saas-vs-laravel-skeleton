<script src="{{ theme_url('assets/libs/toastr/toastr.min.js')}}"></script>

@if ($message = Session::get(config('core.session_success')))
    <script>
      toastr.success('{{ $message }}')
    </script>
@endif

@if ($message = Session::get(config('core.session_error')))
    <script>
      toastr.error('{{ $message }}')
    </script>
@endif