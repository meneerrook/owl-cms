@extends($isXhr ? 'backend/content' : 'backend/layout')

@section('content')
    
    <div class="content-header">
        <h3>Users</h3>
    </div>
    
    <div class="search-wrapper">
        <label>Search by:</label>
        <div class="search-group">
            <select id="condition" class="form-control form-control-sm">
                <option value="id">Id</option>
                <option value="name">Name</option>
                <option value="email">E-mail</option>
                <option value="role">Role</option>
            </select>
            <input id="user-search" type="text" placeholder="Search.." class="form-control form-control-sm">
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Last updated</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $user)
                <tr>
                    <td data-property="id">{{ $user->id }}</td>
                    <td data-property="name">
                        @php 
                            $anchor_statement = ($user->role == 'admin' && Auth::user()->role != 'admin') || ((Auth::user()->role != "admin") && (Auth::user()->role != "manager"));
                            $anchor = "<a href='" . route('owl/users/profile', ['id' => $user->id]) . "' class='has-sub-menu' data-xhr-page>";
                        @endphp

                        {!! (!$anchor_statement ? $anchor : '') !!}

                            @if($user->id == Auth::user()->id)
                                <i class="fa fa-user mr-1"></i>
                            @endif

                            {{ $user->firstname }} {{ $user->lastname }}

                        {!! (!$anchor_statement ? "</a>" : "" ) !!}
                    </td>
                    <td data-property="email">{{ $user->email }}</td>
                    <td data-property="role">{{ $user->role }}</td>
                    <td>{{ strlen($user->updated_at) > 0 ? $user->updated_at : '-' }}</td>
                    <td>{{ strlen($user->created_at) > 0 ? $user->updated_at : '-' }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection

@if(!$isXhr) 
    @section('javascript')
        <script type="text/javascript" id="users" src="{{ asset('js/modules/users.js') }}" data-module="true"></script>
    @endsection
@endif
