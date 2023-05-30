@extends('layouts.admin')

@section('page-title', 'Modifica tipologia')

@section('content')
    <div class="container">
        <h3 class="py-3">Modifica la tipologia:</h3>

        <form action="{{ route('admin.types.update', $type->slug) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome: </label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $type->name) }}">
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
