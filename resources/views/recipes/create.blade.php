@extends('layouts.app')
@section('content')
<div class="container py-5 border rounded bg-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Post your recipe</h1>
            <form method="post" action="{{route('recipes.postRecipe')}}">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" />
                </div>
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredients:</label>
                    <input type="text" class="form-control" id="ingredients" name="ingredients" placeholder="Ingredients" /> 
                </div>
                <div class="mb-3">
                    <label for="instructions" class="form-label">Instructions:</label>
                    <textarea class="form-control" id="instructions" rows="4" name="instructions" placeholder="Instructions"></textarea>
                </div>
                <div class="mb-3">
                    <label for="instructions" class="form-label">Image:</label>
                    <input type="text" class="form-control" id="image" name="image" placeholder="Your image link" />
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Post your recipe</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection