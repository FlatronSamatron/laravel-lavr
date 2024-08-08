@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>

@endif

@if (!empty($errors->all()))
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)

        <div>{{ $error }}</div>

    @endforeach
</div>
@endif