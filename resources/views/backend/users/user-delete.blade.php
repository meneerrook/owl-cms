@extends($isXhr ? 'backend/content' : 'backend/layout')

@section('bodyClass', 'user-delete')

@section('content')
    <h3>Delete user</h3>

<p>
    Are you sure you want to delete user <b>{{ $data->firstname }} {{ $data->lastname }} - ({{ $data->id }})</b>?<br/>
    (This action cannot be undone!)
<p>

<button class="btn btn-primary">delete</button>
@endsection

