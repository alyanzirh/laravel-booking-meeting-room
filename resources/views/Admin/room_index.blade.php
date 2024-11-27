@extends('layouts.meeting')

@section('content')

<div class="card">
    <div class="card-header">{{ __('List of Rooms') }}</div>

    <div class="card-body">

        <a class="btn btn-primary btn-md float-end" href="{{route('app.admin.room.create')}}">Create Room</a>

        <table class="table">
            <tr>
                <th>No</th>
                <th>Room Name</th>
                <th>Capacity</th>
                <th>Facility</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @php($i = 0)
            @foreach($rooms as $room)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->pax }}</td>
                <td>{{ $room->facility }}</td>
                <td>
                    @if($room->photo)
                    <img src="{{ asset('/uploads/rooms/'.$room->photo) }}" style="width:100px">
                    @endif
                </td>
                <td>
                    @if ($room->status === 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('app.admin.room.edit', $room->id) }}" class="btn btn-primary btn-sm d-inline">Edit</a>
                    <form action="{{ route('app.admin.room.destroy', $room->id) }}" method="POST" class="d-inline">
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