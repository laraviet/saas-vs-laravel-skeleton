<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        {{ Form::select($field, $options, null, $props) }}
    </div>
</div>

@if(isset($props['class']) && $props['class'] == 'select2')

    @push('css-extra')
        <link href="{{ theme_url('assets/css/select2.min.css')}}" id="app-light" rel="stylesheet" type="text/css"/>
    @endpush

    @push('script-extra')
        <script src="{{ theme_url('assets/libs/select2/select2.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('.select2').select2()
            })
        </script>
    @endpush
@endif
