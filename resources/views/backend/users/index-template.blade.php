<h3>Users</h3>

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
                <td><a href="{{ route('owl/users/profile', ['id' => $user->id]) }}" class="has-sub-menu" data-xhr-page>{{ $user->firstname }} {{ $user->lastname }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ strlen($user->updated_at) > 0 ? $user->updated_at : '-' }}</td>
                <td>{{ strlen($user->created_at) > 0 ? $user->updated_at : '-' }}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

</div>