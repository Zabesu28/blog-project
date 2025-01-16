@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Articles de la catégorie : {{ $category->name }}</h1>
        <br>
        <br>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card d-flex flex-column" style="height: 100%;">
                    @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Image de {{ $blog->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image par défaut" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column" style="flex-grow: 1;">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">
                            <strong>Auteur :</strong> {{ $blog->author }}<br>
                            <strong>Publié le :</strong> {{ $blog->created_at->format('d/m/Y') }}
                            <br>
                            <strong>Catégorie :</strong> <a class="btn btn-primary btn-sm" href="{{ route('categories.show', $blog->category->id) }}">
                                {{ $blog->category->name }}
                            </a>
                        </p>
                        <div class="d-flex justify-content-between mt-auto">
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Voir
                            </a>
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
    </div>
@endsection
