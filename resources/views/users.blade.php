@extends('layouts.app')

@section('content')
<div class="row">
    <div class="offset-md-2 col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">New User</div>
            <div class="card-body">
                <form action="{{ url('/users/create') }}" method="POST">
                   @csrf
                    <div class="mb-3">
                        <label class="form-label">User Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>Add User
                    </button>
                </form>
            </div>
        </div>

        <div class="card mt-4 shadow-sm">
            <div class="card-header bg-secondary text-white">Current Users</div>
            <div class="card-body">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ url('/users/delete/'.$user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash me-1"></i>Delete
                                    </button>
                                </form>

                                <a href="{{ url('/users/edit/'.$user->id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="fa fa-edit me-1"></i>Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
