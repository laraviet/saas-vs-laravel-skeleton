<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        {!! Form::password($field, ['placeholder' => $placeholder,'class' => 'form-control']) !!}
    </div>
</div>
