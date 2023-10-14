@extends('layouts.app')
@section('content')

<style>
    /* Hover effect styles */
    .hover-effect {
        transition: transform 0.3s, background-color 0.3s;
        /* Smooth transition for transform and background-color */
    }

    .hover-effect:hover {
        transform: scale(1.05);
        /* Slightly scale the card on hover */
        background-color: #f5f5f5;
        /* Change background color on hover */
    }
</style>

@if (count($recipes) <= 0) <div class="container d-flex justify-content-center align-items-center overflow-auto h-100">
    Add your first recipe!
    </div>
    @else
    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
        <div class="container">
            <div class="section-header">
                <p>Cant decide <span>what to eat?</span></p>
                <h3>Browse recipes below</h3>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show">
                    <div class="row gy-4 gx-4 w-100" style="justify-content: center; "> <!-- Adjusted gaps -->
                        @foreach ($recipes as $recipe)
                        <a href="#" style="
    background:white; 
    display: flex; 
    flex-direction: column; 
    justify-content: space-between; 
    height: 65vh;" class="col-lg-4 menu-item card text-dark mb-3 shadow-sm pt-3 mx-4 hover-effect" onclick="setModalId(`{{ $recipe['id'] }}`)" data-bs-toggle="modal" data-bs-target="#u{{ $recipe['id'] }}">
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

    <!-- Modals -->
    @foreach ($recipes as $recipe)
    <div class="modal fade bd-example-modal-lg" id="u{{ $recipe['id'] }}" tabindex="-3h3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            <ul class="ingredients">
                                @foreach(explode(',', $recipe['ingredients']) as $ingredient)
                                @if(trim($ingredient) !== '')
                                <li>{{ trim($ingredient) }}</li>
                                @endif
                                @endforeach
                            </ul>
                            <h4>Instructions</h4>
                            <ol class="dashed">
                                @foreach(explode('-', $recipe['instructions']) as $instruction)
                                @if(trim($instruction) !== '')
                                <li>{{ trim($instruction) }}</li>
                                @endif
                                @endforeach
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    @endsection