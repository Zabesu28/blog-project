@extends('layouts.app')

@section('title', 'Modifier le blog')

@section('content')
<div class="container">
    <h1>Modifier le blog</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Méthode PUT pour la mise à jour -->

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $blog->author) }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Catégorie</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="" disabled>Sélectionnez une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
            <!-- Affichage de l'image actuelle si elle existe -->
            @if($blog->image)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Image actuelle" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                </div>
            @else
                <p>Aucune image actuelle</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection