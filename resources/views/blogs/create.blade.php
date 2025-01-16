@extends('layouts.app')

@section('title', 'Créer un blog')

@section('content')
<div class="container">
    <h1>Créer un nouveau blog</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Protection CSRF -->

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
        </div>

        <br>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Créer</button>
    </form>
</div>
@endsection