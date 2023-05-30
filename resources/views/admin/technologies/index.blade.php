@extends('layouts.admin')

@section('page-title', 'Technologies')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col">N° proggetti</th>
                <th scope="col">
                    <a href="{{ route('admin.technologies.create') }}" class="btn btn-success mt-4">
                        <i class="fa-solid fa-plus pe-2"></i>
                        Crea una nuova tecnologia
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($technologies as $technology)
                <tr>
                    <th scope="row">{{ $technology->id }}</th>
                    <td>{{ $technology->name }}</td>
                    <td>{{ $technology->slug }}</td>
                    <td>{{ $technology->projects ? count($technology->projects) : '0' }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.technologies.edit', $technology->slug) }}" class="btn btn-warning mx-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->slug]) }}"
                            method="POST">

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
                <p class="text-center fs-3 fw-bold">Nessuna tecnologia presente</p>
            @endforelse
        </tbody>
    </table>
@endsection
