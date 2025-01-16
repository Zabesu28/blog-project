@extends('layouts.app') 

@section('title', 'Contact') 

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Contact</h1>
            <hr>            
            @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <form action="{{ route('contact') }}" method="post" class="form">
                @csrf
                <div class="mb-3">
                    <label for="name">Nom</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

@endsection