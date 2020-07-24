<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        {!! Form::hidden($field, '0') !!}
        {!! Form::checkbox($field, '1') !!}
    </div>
</div>
