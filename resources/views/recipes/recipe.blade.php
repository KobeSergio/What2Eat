@extends('layouts.app')
@section('content')

<form method="POST" action="/recipes/edit/{{ $recipe['id'] }}">
    @csrf
    @method('PUT')
    <div class="container mt-5">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-6 mb-4">
                <img src="{{ $recipe['image'] }}" class="img-fluid rounded shadow" alt="Recipe Image">
            </div>
            <!-- Ingredients and Instructions Section -->
            <div class="col-md-6">
                <!-- Ingredients -->
                <h4 class="mb-3">Title</h4>
                <ul class="list-group mb-4">
                    <input type="text" class="list-group-item" name="title" value="{{ $recipe['title'] }}" />
                </ul>
                <!-- Ingredients -->
                <h4 class="mb-3">Ingredients</h4>
                <ul class="list-group mb-4">
                    <input type="text" class="list-group-item" name="ingredients" value="{{ $recipe['ingredients'] }}" />
                </ul>
                <!-- Instructions -->
                <h4 class="mb-3">Instructions</h4>
                <ul class="list-group mb-4 ">
                    <input type="text" class="list-group-item" name="instructions" value="{{ $recipe['instructions'] }}" />
                </ul>

                <h4 class="mb-3">Image</h4>
                <ul class="list-group mb-4">
                    <input type="text" class="list-group-item" name="image" value="{{ $recipe['image'] }}" />
                </ul>

                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

@endsection