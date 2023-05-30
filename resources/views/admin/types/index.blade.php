@extends('layouts.admin')

@section('page-title', 'Types')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col">N° proggetti</th>
                <th scope="col">
                    <a href="{{ route('admin.types.create') }}" class="btn btn-success mt-4">
                        <i class="fa-solid fa-plus pe-2"></i>
                        Crea una nuova tipologia
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->slug }}</td>
                    <td>{{ $type->projects ? count($type->projects) : '0' }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.types.edit', $type->slug) }}" class="btn btn-warning mx-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <form action="{{ route('admin.types.destroy', ['type' => $type->slug]) }}" method="POST">

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
                <p class="text-center fs-3 fw-bold">Nessuna tipologia presente</p>
            @endforelse
        </tbody>
    </table>
@endsection
