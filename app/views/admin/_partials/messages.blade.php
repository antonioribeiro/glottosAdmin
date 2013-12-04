@if(isset($success))
    <div class="alert alert-success">{{ $success }}</div>
@endif

@if(isset($info))
    <div class="alert alert-info">{{ $info }}</div>
@endif

@if(isset($warning))
    <div class="alert alert-warning">{{ $warning }}</div>
@endif

@if(isset($danger))
    <div class="alert alert-danger">{{ $danger }}</div>
@endif