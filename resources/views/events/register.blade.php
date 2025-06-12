<!DOCTYPE html>
<html>

<head>
    <title>Register for Event: {{ $event->title }}</title>
</head>

<body>
    <h1>Register for Event: {{ $event->title }}</h1>

    @if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('events.register', $event->id) }}">
        @csrf

        <label>Your Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <label>Your Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <button type="submit">Register</button><br><br>
    </form>

    <a href="{{ route('events.index') }}">
        <button>Back to Events List</button>
    </a>
</body>

</html>