@extends('layouts.meeting_user')

@section('content')

<div class="card">
    <div class="card-header">{{ __('List of Booking') }}</div>

    <div class="card-body">

        <a class="btn btn-primary btn-md float-end" href="{{route('app.booking.create')}}">Make Booking</a>

        <table class="table">
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Room Name</th>
                <th>Time From</th>
                <th>Time To</th>
                <th>Pax</th>
                <th>Remark</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @php($i = 0)
            @foreach($bookings as $booking)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $booking->date }}</td>
                <td>{{ $booking->room->name }}</td>
                <td>{{ $booking->time_from }}</td>
                <td>{{ $booking->time_to }}</td>
                <td>{{ $booking->pax }}</td>
                <td>{{ $booking->remark }}</td>
                <td>
                    @if ($booking->status === 1)
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-warning">Pending</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('app.booking.edit', $booking->id) }}" class="btn btn-primary btn-sm d-inline">Edit</a>
                    <form action="{{ route('app.booking.destroy', $booking->id) }}" method="POST" class="d-inline">
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