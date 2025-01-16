@extends('layouts.app')

@section('title', 'Ajouter une catégorie')

@section('content')
<div class="container">
    <h1>Ajouter une catégorie</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom de la catégorie</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
    </form>
</div>
@endsection