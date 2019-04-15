@extends($isXhr ? 'backend/content' : 'backend/layout')

@section('bodyClass', 'user-delete')

@section('content')

    @if($data->role == 'admin' && Auth::user()->role != "admin")
        <h3>Delete user</h3>
        <p>You do not have permission to delete this user.</p>
    @else
        <h3>Delete user</h3>
        <p>
            Are you sure you want to delete user <b>{{ $data->firstname }} {{ $data->lastname }} - ({{ $data->id }})</b>?<br/>
            (This action cannot be undone!)
        <p>
        <button class="btn btn-primary">delete</button>
    @endif
@endsection

