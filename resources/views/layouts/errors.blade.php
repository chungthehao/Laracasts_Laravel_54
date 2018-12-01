@if (count($errors))
    <div class="form-group">
        <ul class="alert alert-danger px-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif