@extends($isXhr ? 'backend/content' : 'backend/layout')

@section('bodyClass', 'user-edit')

@section('content')
    <h3>Edit user</h3>

    @if($data->role == "admin" && Auth::user()->role != "admin")
        <p>You do not have permission to edit this specific user.</p>
    @else

    @endif
@endsection

