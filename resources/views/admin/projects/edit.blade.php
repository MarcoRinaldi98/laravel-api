@extends('layouts.admin')

@section('page-title', 'Modifica progetto')

@section('content')
    <div class="container">
        <h2 class="text-center">Modifica progetto: </h2>
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo: </label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagine: </label>

                @if ($project->image)
                    <div class="my-img-wrapper">
                        <img class="img-thumbnail my-img-thumb" src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title }}">
                        <a href="{{ route('admin.projects.deleteImage', ['project' => $project->slug]) }}"
                            class="btn btn-danger my-img-delete">X</a>
                    </div>
                @endif

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
                    {{ old('description', $project->description) }}
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
                    <option @selected(old('type_id', $project->type_id) == '') value="">Nessuna Tipologia</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
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
                    @if ($errors->any())
                        <input type="checkbox" @if (in_array($technology->id, old('technologies', []))) checked @endif
                            id="technology_{{ $technology->id }}" name="technologies[]" value="{{ $technology->id }}">
                    @else
                        <input type="checkbox" @if ($project->technologies->contains($technology->id)) checked @endif
                            id="technology_{{ $technology->id }}" name="technologies[]" value="{{ $technology->id }}">
                    @endif
                    <label for="technology_{{ $technology->id }}" class="form-label">{{ $technology->name }}</label>
                    <br />
                @endforeach
                @error('technologies')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Salva</button>
        </form>
    </div>
    </div>
    </div>
@endsection
