@extends('layouts.admin')

@section('page-title', 'Crea una nuova tipologia')

@section('content')
    <div class="container">
        <h3 class="py-3">Modulo per l'inserimento di una nuova tipologia:</h3>

        <form action="{{ route('admin.types.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome: </label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}">
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
