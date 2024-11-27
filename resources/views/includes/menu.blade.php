<a href="{{route('app.admin.dashboard')}}" class="btn btn-primary w-100 mb-1">Dashboard</a>
<a class="btn btn-primary w-100 mb-1">Manage Booking</a>
<a href="{{route('app.admin.room.index')}}" class="btn btn-primary w-100 mb-1">Manage Room</a>
<a href="{{route('app.admin.user.index')}}" class="btn btn-primary w-100 mb-1">Manage User</a>
<button class="btn btn-danger w-100 mb-1"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>