@extends($isXhr ? 'backend/content' : 'backend/layout')

@section('content')
    
    <div class="content-header">
        <h3>Users</h3>
    </div>
    
    <div class="search-wrapper">
        <label>Search by:</label>
        <div class="search-group">
            <select class="form-control form-control-sm">
                <option>Id</option>
                <option>Name</option>
                <option>E-mail</option>
                <option>Role</option>
            </select>
            <input type="text" placeholder="Search.." class="form-control form-control-sm">
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
                    <td>{{ $user->id }}</td>
                        <td>
                            @php 
                                $anchor_statement = ($user->role == 'admin' && Auth::user()->role != 'admin') || ((Auth::user()->role != "admin") && (Auth::user()->role != "manager"));
                            @endphp
                            {!! (!$anchor_statement ? "<a href='" . route('owl/users/profile', ['id' => $user->id]) . "' class='has-sub-menu' data-xhr-page>" : '') !!}
                                @if($user->id == Auth::user()->id)
                                    <i class="fa fa-user mr-1"></i>
                                @endif
                                {{ $user->firstname }} {{ $user->lastname }}
                            {!! (!$anchor_statement ? "</a>" : "" ) !!}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ strlen($user->updated_at) > 0 ? $user->updated_at : '-' }}</td>
                        <td>{{ strlen($user->created_at) > 0 ? $user->updated_at : '-' }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>

    </div>
@endsection

