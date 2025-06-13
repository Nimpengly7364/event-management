<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="my-4 text-center fw-bold">{{ __('Dashboard') }}</h2>
        </div>
    </x-slot>

    <div class="py-4 bg-light">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @forelse ($events as $event)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary mb-3">{{ $event->title }}</h5>
                                
                                <ul class="list-unstyled mb-3">
                                    <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</li>
                                    <li><strong>Location:</strong> {{ $event->location }}</li>
                                    <li><strong>Capacity:</strong> {{ $event->capacity }}</li>
                                </ul>

                                <p class="card-text text-secondary" style="min-height: 60px;">
                                    {{ Str::limit($event->description, 100) }}
                                </p>

                                <form method="POST" action="{{ route('events.register', $event->id) }}">
                                    @csrf
                                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    <button type="submit" class="btn btn-success btn-sm mt-2">
                                        Register Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            No events available at the moment.
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
