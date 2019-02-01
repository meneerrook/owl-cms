@extends($isXhr ? 'backend/content' : 'backend/layout')

@section('bodyClass', 'user-add')

@section('content')
    
<div class="small-form">
    <h3 class="mb-4">Add user</h3>

    <form class="mt-4" method="post" action="{{ action('Backend\UsersController@create') }}" data-xhr-post="add-user">
        {{ csrf_field() }}

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Firstname</label>
            <div class="col-sm-10">
                <input type="text" name="firstname" class="form-control" placeholder="Firstname">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Lastname</label>
            <div class="col-sm-10">
                <input type="text" name="lastname" class="form-control" placeholder="Lastname">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" name="email "class="form-control" placeholder="E-mail">
            </div>
        </div>

        @php
            $roles = config('roles');
        @endphp

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select class="form-control" name="role">
                    @foreach($roles as $key => $value)
                        @if($key == "admin" && Auth::user()->role != "admin")
                            @php continue; @endphp
                        @endif
                        <option>{{ $key }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-loader float-right">Add user</button>
            </div>
        </div>
    </form>
</div>
@endsection

@if(!$isXhr) 
    @section('javascript')
        <script type="text/javascript" id="users" src="{{ asset('js/modules/user-add.js') }}" data-module="true"></script>
    @endsection
@endif

