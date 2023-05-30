@extends('layouts.admin')

@section('page-title', 'Projects')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Immagine</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Tecnologie</th>
                <th scope="col">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-success mt-4">
                        <i class="fa-solid fa-plus pe-2"></i>
                        Crea un nuovo progetto
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>
                        @if ($project->image)
                            <img class="img-thumbnail my-img-index" src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}" />
                        @else
                            <div class="w-50 bg-secondary py-4 text-center">
                                No image yet
                            </div>
                        @endif
                    </td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->type?->name }}</td>
                    <td>
                        @foreach ($project->technologies as $technology)
                            <span class="badge rounded-pill text-bg-secondary">{{ $technology->name }}</span>
                        @endforeach
                    </td>
                    <td class="d-flex">
                        <a class="btn btn-primary" href="{{ route('admin.projects.show', $project->slug) }}">
                            <i class="fa-solid fa-circle-info"></i>
                        </a>

                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning mx-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger delete-btn">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            @include('partials.delete-modal')
                        </form>
                    </td>
                </tr>
            @empty
                <p class="text-center fs-3 fw-bold">Nessun proggetto presente</p>
            @endforelse
        </tbody>
    </table>
@endsection
