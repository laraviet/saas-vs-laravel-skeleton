<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        <div class="tui-datepicker-input tui-datetime-input tui-has-focus">
            <input type="text" id="datepicker-input_{{ $field }}" aria-label="Date-Time" name="{{ $field }}"
                   autocomplete="off">
            <span class="tui-ico-date"></span>
        </div>
        <div id="wrapper_{{ $field }}" style="margin-top: -1px;"></div>
    </div>
</div>
@push('css-extra')
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css">
    <style>
        .tui-datepicker {
            z-index: 9;
        }
    </style>
@endpush
@push('script-extra')
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.js"></script>
    <script>
      $(function () {
        new tui.DatePicker('#wrapper_{{ $field }}', {
          date: new Date('{{ $oldValue }}'),
          input: {
            element: '#datepicker-input_{{ $field }}',
            format: 'yyyy-MM-dd'
          },
        })
      })
    </script>
@endpush
