@extends('layouts.admin')


@section('page-title')
    {{ $project->title }}
@endsection

@section('content')
    <div class="container">

        @if ($project->image)
            <img class="mt-3 img-thumbnail" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" />
        @else
            <div class="w-50 bg-secondary py-4 text-center">
                No image yet
            </div>
        @endif

        <h1 class="text-center mt-2 text-primary">{{ $project->title }}</h1>

        <div class="d-flex justify-content-between mt-3">
            <h5>{{ $project->type ? $project->type->name : 'Nessuna tipologia associata' }}</h5>
            <p class="text-secondary">{{ $project->slug }}</p>
        </div>

        <h5>Creato in data {{ $project->created_at }}</h5>

        @forelse ($project->technologies as $technology)
            <span class="badge rounded-pill text-bg-primary">{{ $technology->name }}</span>
        @empty
            <small>Nessuna Tecnologia associata</small>
        @endforelse
        <p class="mt-3">{{ $project->description }}</p>

    </div>

    <div class="d-flex justify-content-center py-5">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary me-2">Torna alla lista</a>
    </div>
@endsection
