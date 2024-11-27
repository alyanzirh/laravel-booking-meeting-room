@extends('layouts.meeting')

@section('content')

<div class="card">
    <div class="card-header">{{ __('List of Users') }}</div>

    <div class="card-body">

        <a class="btn btn-primary btn-md float-end" href="{{route('app.admin.user.create')}}">Create User</a>

        <table class="table">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Staff ID</th>
                <th>Role</th>
                <th>Action</th>
            </tr>

            @php($i = 0)
            @foreach($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->staff_id }}</td>
                <td>
                    @if ($user->role === 'user')
                        <span class="badge bg-success">User</span>
                    @else
                        <span class="badge bg-danger">Admin</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('app.admin.user.edit', $user->id) }}" class="btn btn-primary btn-sm d-inline">Edit</a>
                    <form action="{{ route('app.admin.user.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</div>

@endsection