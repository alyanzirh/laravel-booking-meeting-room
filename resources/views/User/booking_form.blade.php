@extends('layouts.meeting_user')

@section('content')

<div class="card">
    <div class="card-header">{{ __('Booking Details') }}</div>

    <div class="card-body">
        @if($booking->id)
            <form action="{{route('app.booking.update', $booking->id)}}" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
            <form action="{{route('app.booking.store')}}" method="post">
            <input type="hidden" name="_method" value="POST">
        @endif
        
        @csrf

            <table class="table">
                <tr>
                    <th>Room Name</th>
                    <td>
                        <select class="form-control" name="room_id">
                            @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">
                                {{ $room->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('room_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>
                        <input type="date" class="form-control" name="date" value="{{ old('date', $booking->date) }}">
                        @error('date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Time From</th>
                    <td>
                        <input type="time" class="form-control" name="time_from" value="{{ old('time_from', $booking->time_from) }}">
                        @error('time_from')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Time To</th>
                    <td>
                        <input type="time" class="form-control" name="time_to" value="{{ old('time_to', $booking->time_to) }}">
                        @error('time_to')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Pax</th>
                    <td>
                        <input type="number" class="form-control" name="pax" value="{{ old('pax', $booking->pax) }}">
                        @error('pax')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Remark</th>
                    <td>
                        <input type="text" class="form-control" name="remark" value="{{ old('remark', $booking->remark) }}">
                        @error('remark')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>

            </table>
        
            <a href="{{route('app.booking.index')}}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
</div>

@endsection