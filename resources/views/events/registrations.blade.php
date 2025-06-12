<!DOCTYPE html>
<html>
<head>
    <title>Registered Users for Event: {{ $event->title }}</title>
</head>
<body>
    <h2>Registrations for: {{ $event->title }}</h2>

    @if ($event->registrations->count())
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            @foreach ($event->registrations as $index => $registration)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $registration->user->name }}</td>
                    <td>{{ $registration->user->email }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No registrations yet.</p>
    @endif

    <br>
    <a href="{{ route('events.register', $event->id) }}">
        <button>Register</button>
    </a>
    <a href="{{ route('events.index') }}">
        <button>Back to Events List</button>
    </a>
</body>
</html>
