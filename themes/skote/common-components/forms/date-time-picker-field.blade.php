<input type="text" id="datepicker-input_{{ $field }}" name="{{ $field }}" class="selectDate"
       placeholder="{{ $placeholder ?? '' }}"
       autocomplete="off">
<div id="wrapper_{{ $field }}" style="margin-top: -1px;"></div>

@push('css-extra')
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css">
    <style>
        .tui-datepicker {
            z-index: 9;
        }

        .selectDate {
            width: 100%;
        }
    </style>
@endpush
@push('script-extra')
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.js"></script>
    <script>
        $(function () {
            const urlParams = new URLSearchParams(window.location.search)
            let valueDate = urlParams.get(encodeURIComponent('{{ $field }}'));
            new tui.DatePicker('#wrapper_{{ $field }}', {
                date: new Date(valueDate !== null ? valueDate : ''),
                input: {
                    element: '#datepicker-input_{{ $field }}',
                    format: 'yyyy-MM-dd'
                },
            })
        })
    </script>
@endpush
