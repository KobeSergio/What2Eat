@extends('layouts.app')
@section('content')
<div class="container">
    <section id="menu" class="menu">
        <div class="container">
            <div style="margin-bottom: 40px;">
                <h3>Your recipes posted:</h3>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show">
                    <div class="row gy-5">
                        @foreach ($recipes as $recipe)
                        <a href="#" style="
    background:white; 
    display: flex; 
    flex-direction: column; 
    justify-content: space-between; 
    height: 60vh;" class="col-lg-3 menu-item card text-dark mb-3 shadow-sm pt-3 mx-4 hover-effect" onclick="setModalId(`{{ $recipe['id'] }}`)" data-bs-toggle="modal" data-bs-target="#u{{ $recipe['id'] }}">
                            <img src="{{ $recipe['image'] }}" class="card-img-top rounded-top aspect-ratio-content" style="object-fit: cover; height:30vh;" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ $recipe['title'] }}</h4>
                                <p class="card-text ingredients">
                                    {{ $recipe['ingredients'] }}
                                </p>
                            </div>
                            <div class="card-footer" style="background:white">
                                <p class="card-text price">
                                    View recipe
                                </p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modals -->
@foreach ($recipes as $recipe)
<div class="modal fade bd-example-modal-lg" id="u{{ $recipe['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">{{$recipe['title']}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <img src="{{ $recipe['image'] }}" class="img-fluid rounded" alt="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <h4>Ingredients</h4>
                        <ul class="ingredients" data-id="{{ $recipe['id'] }}">
                            @foreach(explode(',', $recipe['ingredients']) as $ingredient)
                            @if(trim($ingredient) !== '')
                            <li>{{ trim($ingredient) }}</li>
                            @endif
                            @endforeach
                        </ul>
                        <h4>Instructions</h4>
                        <ol class="instructions" data-id="{{ $recipe['id'] }}">
                            @foreach(explode('-', $recipe['instructions']) as $instruction)
                            @if(trim($instruction) !== '')
                            <li>{{ trim($instruction) }}</li>
                            @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Edit Recipe Button -->
                <a href="{{ route('recipes.recipe', $recipe['id']) }}" class="btn btn-primary" id="editBtn{{ $recipe['id'] }}">Edit</a>
                <!-- Delete Recipe Button -->
                <form method="POST" action="{{ route('recipes.destroy', $recipe['id']) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection