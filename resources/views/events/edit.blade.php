<!DOCTYPE html>
<html>

<head>
    <title>Edit Event</title>
</head>

<body>
    <h1>Edit Event</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title:</label><br>
        <input type="text" name="title" value="{{ old('title', $event->title) }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description', $event->description) }}</textarea><br><br>

        <label>Location:</label><br>
        <input type="text" name="location" value="{{ old('location', $event->location) }}"><br><br>

        <label>Date:</label><br>
        <input type="date" name="date" value="{{ old('date', $event->date) }}"><br><br>

        <label>Capacity:</label><br>
        <input type="number" name="capacity" value="{{ old('capacity', $event->capacity) }}"><br><br>

        <button type="submit">Update Event</button>

        <a href="{{ route('events.index') }}">
            <button>Back to Events</button>
        </a>
    </form>
</body>
</html>