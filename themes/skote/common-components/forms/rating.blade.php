<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        {!! Form::hidden($field, null, [
            'class' => 'rating',
            'data-filled' => 'mdi mdi-star text-primary',
            'data-empty' => 'mdi mdi-star-outline text-muted'
        ]) !!}
    </div>
</div>
