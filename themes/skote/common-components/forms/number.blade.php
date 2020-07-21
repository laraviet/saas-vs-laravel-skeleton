<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        {!! Form::number($field, null, ['min' => $min, 'max' => $max, 'class' => 'form-control', 'placeholder' => $placeholder]) !!}
    </div>
</div>
