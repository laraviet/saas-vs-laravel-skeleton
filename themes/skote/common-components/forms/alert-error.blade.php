@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> {{ __('core::labels.problem_msg') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

