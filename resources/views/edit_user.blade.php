@extends('layouts.app')

@section('content')
<div class="offset-md-2 col-md-8">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark fw-bold">Edit User Information</div>
        <div class="card-body">
            <form action="{{ url('/users/update/'.$user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">User Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <button type="submit" class="btn btn-warning">Update User</button>
                <a href="{{ url('/users') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
