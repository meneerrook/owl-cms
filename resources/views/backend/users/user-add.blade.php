@extends($isXhr ? 'backend/content' : 'backend/layout')

@section('bodyClass', 'user-add')

@section('content')
    
<div class="small-form">
    <h3 class="mb-4">Add user</h3>
    <form class="mt-4">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Firstname</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Firstname">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Lastname</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Lastname">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="E-mail">
            </div>
        </div>

        @php
            $roles = config('roles');
        @endphp

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select class="form-control">
                    @foreach($roles as $key => $value)
                        <option>{{ $key }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary float-right">Add user&nbsp;&nbsp;<i class="fa fa-plus"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection

