<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//==============Recipes==============//
//GET:
Route::get("/recipes", [RecipeController::class, "index"])->name("recipes.index");
Route::get("/recipes/create", [RecipeController::class, "create"])->name("recipes.create");
Route::get("/recipes/recipe/{id}", [RecipeController::class, "recipe"])->name("recipes.recipe");

//POST:
Route::post("/recipes", [RecipeController::class, "postRecipe"])->name("recipes.postRecipe");
//PUT:
Route::put("/recipes/edit/{id}", [RecipeController::class, "updateRecipe"])->name("recipes.edit"); 
//DELETE:
Route::delete("/recipes/{id}", [RecipeController::class, "deleteRecipe"])->name("recipes.destroy");

//==============Users==============//
//GET:
Route::get("/users", [UserController::class, "index"])->name("users.index");
Route::get("/users/create", [UserController::class, "create"])->name("users.create");

Auth::routes();
