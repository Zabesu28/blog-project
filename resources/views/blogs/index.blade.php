@extends('layouts.app')

@section('title', 'Liste des blogs')

@section('content')
<div class="row my-5">
    <div class="col-12">
        <h1 class="pb-3 border-bottom">Liste des blogs</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-success mb-3">Ajouter un blog</a>

        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        <div class="row">
            @forelse($blogs as $blog)
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
            @empty
            <div class="col-12">
                <p class="text-center">Aucun article de blog trouvé.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection