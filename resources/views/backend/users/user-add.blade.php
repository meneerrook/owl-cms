@extends($isXhr ? 'backend/content' : 'backend/layout')

@section('content')
    
<div class="small-form">
    <h3 class="mb-4">Add user</h3>

    <form class="mt-4" method="post" action="{{ action('Backend\UsersController@create') }}" data-xhr-post="add-user" data-owldtr-form="user-add">
        {{ csrf_field() }}

        <div class="form-section">
            <h6>Details</h6>
            <div class="grouped-input" autocomplete="fuckoff" data-validation="firstname" data-validation-msg="" data-owldtr="user-add" data-owldtr-rules="min_char:2|alpha">
                <input type="text" name="firstname" class="form-control">
                <span>Firstname</span>
            </div>
            <div class="grouped-input" data-validation="lastname" data-validation-msg="" data-owldtr="user-add" data-owldtr-rules="min_char:2|alpha">
                <input type="text" name="lastname" class="form-control">
                <span>Lastname</span>
            </div>
            <div class="grouped-input" data-validation="email" data-validation-msg=""  data-owldtr="user-add" data-owldtr-rules="email">
                <input type="text" name="email" class="form-control">
                <span>E-mail</span>
            </div>
        </div>
        <div class="form-section">
            <h6>Configuration</h6>
            @php
                $roles = config('roles');
            @endphp
            <div class="grouped-input" data-validation="role" data-validation-msg="" data-owldtr="user-add" data-owldtr-rules="one_of:admin,manager,editor,user">
                <select class="form-control" name="role">
                    <option value=""></option>
                    @foreach($roles as $key => $value)
                        @if($key == "admin" && Auth::user()->role != "admin")
                            @php continue; @endphp
                        @endif
                        <option>{{ $key }}</option>
                    @endforeach
                </select>
                <span>Role</span>
            </div>
            <div class="grouped-input" data-validation="status" data-validation-msg="" data-owldtr="user-add" data-owldtr-rules="one_of:active,inactive">
                <select class="form-control" name="status">
                    <option value=""></option>
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>
                </select>
                <span>Status</span>
            </div>
        </div>
        <div class="form-section">
            <h6>Security</h6>
            <div class="grouped-input" data-validation="password" data-validation-msg="" data-owldtr="user-add" data-owldtr-rules="min_char:5">
                <input type="password" name="password" class="form-control">
                <span>Password</span>
            </div>
            <div class="grouped-input" data-validation="password_confirmation" data-validation-msg=""  data-owldtr="user-add" data-owldtr-rules="equal:password|min_char:5">
                <input type="password" name="password_confirmation" class="form-control">
                <span>Password confirmation</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-loader float-right">Add user</button>
    </form>
    <div class="form-group row messages" data-msg>
    </div>
</div>
@endsection

@if(!$isXhr) 
    @section('javascript')
        <script type="text/javascript" id="users" src="{{ asset('js/modules/user-add.js') }}" data-module="true"></script>
    @endsection
@endif

