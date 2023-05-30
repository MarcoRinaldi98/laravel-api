@extends('layouts.admin')

@section('page-title', 'Crea nuovo progetto')

@section('content')
    <div class="container">
        <h3 class="py-3">Modulo per l'inserimento di un nuovo progetto:</h3>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo: </label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagine: </label>
                <input type="file" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione: </label>
                <textarea name="description" id="description" rows="10"
                    class="form-control @error('description') is-invalid @enderror">
                    {{ old('description') }}
                </textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Tipologia: </label>
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option @selected(old('type_id') == '') value="">Nessuna Tipologia</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                @foreach ($technologies as $technology)
                    <input type="checkbox" @if (in_array($technology->id, old('technologies', []))) checked @endif
                        id="technology_{{ $technology->id }}" name="technologies[]" value="{{ $technology->id }}">
                    <label for="tecnology_{{ $technology->id }}" class="form-label">{{ $technology->name }}</label>
                    <br />
                @endforeach
                @error('technologies')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection
