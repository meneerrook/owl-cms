@extends($isXhr ? 'backend/content' : 'backend/layout')

@section('bodyClass', 'user-profile')

@section('content')
    <h6 class="mb-4">User <b>{{ $data->firstname }} {{ $data->lastname }}</b></h6>

<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card mb-4">
            <div class="card-header font-weight-bold">Data</div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-3 text-right">Avatar:</div>
                    <div class="col-9">
                        <img src="https://via.placeholder.com/150" alt="Avatar" class="rounded">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 text-right">Firstname:</div>
                    <div class="col-9 font-weight-bold">{{ $data->firstname }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 text-right">Lastname:</div>
                    <div class="col-9 font-weight-bold">{{ $data->lastname }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 text-right">E-mail:</div>
                    <div class="col-9 font-weight-bold">{{ $data->email }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 text-right">Role:</div>
                    <div class="col-9 font-weight-bold">{{ $data->role }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 text-right">Status:</div>
                    <div class="col-9 font-weight-bold">{{ $data->status }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 text-right">Updated:</div>
                    <div class="col-9 font-weight-bold">{{ $data->updated_at ? $data->updated_at : '-' }}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right">Created:</div>
                    <div class="col-9 font-weight-bold">{{ $data->created_at ? $data->created_at : '-' }}</div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header font-weight-bold">Posts</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 text-right">Amount:</div>
                    <div class="col-9 font-weight-bold">{{ $data->firstname }}</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><small>Published:</small></div>
                    <div class="col-9"><small>{{ $data->firstname }}</small></div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 text-right"><small>Drafts:</small></div>
                    <div class="col-9"><small>{{ $data->firstname }}</small></div>
                </div>

                <div class="row">
                    <div class="col-3 text-right">Visitors:</div>
                    <div class="col-9 font-weight-bold">77</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><small>Average:</small></div>
                    <div class="col-9"><small>55.6</small></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 text-right"><small>Amount:</small></div>
                    <div class="col-9"><small>100</small></div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-6"><div class="card">
            <div class="card-header font-weight-bold">Privileges</div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-3 text-right">Posts module:</div>
                    <div class="col-9 font-weight-bold">Full</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><small>Adding:</small></div>
                    <div class="col-9"><small>Yes</small></div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><small>Editing:</small></div>
                    <div class="col-9"><small>Yes</small></div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 text-right"><small>Deleting:</small></div>
                    <div class="col-9"><small>Yes</small></div>
                </div>

                <div class="row">
                    <div class="col-3 text-right">Pages module:</div>
                    <div class="col-9 font-weight-bold">Partial</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><small>Adding:</small></div>
                    <div class="col-9"><small>No</small></div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><small>Editing:</small></div>
                    <div class="col-9"><small>Yes</small></div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 text-right"><small>Deleting:</small></div>
                    <div class="col-9"><small>No</small></div>
                </div>

                <div class="row">
                    <div class="col-3 text-right">Users module:</div>
                    <div class="col-9 font-weight-bold">None</div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><small>Adding:</small></div>
                    <div class="col-9"><small>No</small></div>
                </div>
                <div class="row">
                    <div class="col-3 text-right"><small>Editing:</small></div>
                    <div class="col-9"><small>No</small></div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 text-right"><small>Deleting:</small></div>
                    <div class="col-9"><small>No</small></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

