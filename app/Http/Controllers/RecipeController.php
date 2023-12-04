<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        //Get all recipes from the database that belongs to the user
        $recipes = Recipe::where("user_id", auth()->user()->id)->get()->toArray();
        return view("recipes.index", ["recipes" => $recipes]);
    }

    public function test()
    {
        //Test function for pushing to github
    }


    public function recipe($id)
    {
        //Get single recipe object from the database and return it to the view
        $recipe = Recipe::find($id);
        return view("recipes.recipe", ["recipe" => $recipe]);
    }

    public function create()
    {
        return view("recipes.create");
    }

    public function deleteRecipe($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();

        return redirect(route("home"));
    }

    public function updateRecipe(Request $request, $id)
    { 
        $data = $request->validate([
            "title" => "required",
            "ingredients" => "required",
            "instructions" => "required",
            "image" => "required|url",
        ]);

        Recipe::where('id', $id)->update($data);

        return redirect(url("/recipes/recipe/$id"));
    }

    public function postRecipe(Request $request)
    {
        $data = $request->validate([
            "title" => "required",
            "ingredients" => "required",
            "instructions" => "required",
            "image" => "required|url",
        ]);

        $data["user_id"] = auth()->user()->id;

        $newRecipe = Recipe::create($data);

        return redirect(route("home"));
    }
}
