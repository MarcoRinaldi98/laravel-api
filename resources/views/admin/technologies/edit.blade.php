@extends('layouts.admin')

@section('page-title', 'Modifica tecnologia')

@section('content')
    <div class="container">
        <h3 class="py-3">Modifica la tecnologia:</h3>

        <form action="{{ route('admin.technologies.update', $technology->slug) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome: </label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $technology->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection
