<!DOCTYPE html>
<html>
<head>
    <title>Event Details</title>
</head>
<body>
    <h1>{{ $event->title }}</h1>

    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <p><strong>Capacity:</strong> {{ $event->capacity }}</p>
    <p>{{ $event->description }}</p>

    <a href="{{ route('events.edit', $event->id) }}">
        <button>Edit</button>
    </a>
    <a href="{{ route('events.index') }}">
        <button>Back to Events</button>
    </a>
</body>
</html>
