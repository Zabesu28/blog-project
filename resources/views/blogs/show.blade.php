@extends('layouts.app')

@section('title', 'Voir le blog')

@section('content')
<div class="container">
    <h1>{{ $blog->title }}</h1>

    <div class="row my-4">
        <div class="col-md-8">
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid" alt="Image de {{ $blog->title }}" style="max-height: 400px; object-fit: cover;">
            @else
                <img src="https://via.placeholder.com/800x400" class="img-fluid" alt="Image par défaut" style="max-height: 400px; object-fit: cover;">
            @endif
        </div>
        <div class="col-md-4">
            <p><strong>Auteur :</strong> {{ $blog->author }}</p>
            <p><strong>Publié le :</strong> {{ $blog->created_at->format('d/m/Y') }}</p>
            <strong>Catégorie :</strong> {{ $blog->category->name }}
        </div>
    </div>

    <div class="content">
        <h3>Contenu :</h3>
        <p>{{ $blog->content }}</p>
    </div>

    <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-3">Retour à la liste des blogs</a>
</div>
@endsection