<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">

    <div class="container py-5">
        <h1 class="text-center mb-4 fw-bold">All Events</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('events.create') }}" class="btn btn-primary">Create New Event</a>
        </div>

        @forelse ($events as $event)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>

                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-success">View Details</a>
                        <a href="{{ route('events.showRegistrations', $event->id) }}" class="btn btn-secondary">View Registrations</a>

                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                No events found.
            </div>
        @endforelse
    </div>

    <!-- Bootstrap 5 JS (Optional, for alerts etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
