<!DOCTYPE html>
<html>

<head>
    <title>Create Event</title>
</head>

<body>
    <h1>Create New Event</h1>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf

        <label>Title:</label><br>
        <input type="text" name="title" value="{{ old('title') }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <label>Location:</label><br>
        <input type="text" name="location" value="{{ old('location') }}"><br><br>

        <label>Date:</label><br>
        <input type="date" name="date" value="{{ old('date') }}"><br><br>

        <label>Capacity:</label><br>
        <input type="number" name="capacity" value="{{ old('capacity') }}"><br><br>

        <button type="submit">Save Event</button><br><br>

    </form>
    <a href="{{ route('events.index') }}">
        <button>Back to Events</button></a>
</body>

</html>