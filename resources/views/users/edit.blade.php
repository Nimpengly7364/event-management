<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
</head>

<body>
    <h1>Edit User: {{ $user->name }}</h1>

    @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $user->name) }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $user->email) }}"><br><br>

        <label>New Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>Confirm New Password:</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <button type="submit">Update User</button>

        <a href="{{ route('users.index') }}">
            <button>Back to Users List</button>
        </a>
    </form>
</body>

</html>