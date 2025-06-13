<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">{{ $event->title }}</h3>
                    </div>

                    <div class="card-body">
                        <p><strong>Date:</strong> {{ $event->date }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Capacity:</strong> {{ $event->capacity }}</p>
                        <p class="mt-3">{{ $event->description }}</p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-success">Edit Event</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (optional for components like modals/alerts) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
