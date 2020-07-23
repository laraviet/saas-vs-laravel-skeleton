<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        @foreach($list as $item)
            <label>
                {{ Form::checkbox($field, $item->id, $item->checked ?? false) }} {{ $item->name }}
            </label>
            <br/>
        @endforeach
    </div>
</div>
