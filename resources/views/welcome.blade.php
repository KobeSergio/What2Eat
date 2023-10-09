@extends('layouts.app')
@section('content')

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
                    <div class="row gy-5">
                        @foreach ($recipes as $recipe)
                        <a href="#" class="col-lg-4 menu-item" onclick="setModalId(`{{ $recipe['id'] }}`)" data-bs-toggle="modal" data-bs-target="#u{{ $recipe['id'] }}">
                            <img src="{{ $recipe['image'] }}" class="menu-img img-fluid rounded" alt="">
                            <h4>{{ $recipe['title'] }}</h4>
                            <p class="ingredients">
                                {{ $recipe['ingredients'] }}
                            </p>
                            <p class="price">
                                View recipe
                            </p>
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