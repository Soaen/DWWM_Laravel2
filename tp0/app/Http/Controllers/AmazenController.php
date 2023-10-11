<?php

namespace App\Http\Controllers;

use App\Models\Amazen;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AmazenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Amazen::all();

        //Filtrer avec Post:all(['title', 'name'])

        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        for ($i = 1; $i <= 10; $i++) {
            $amazen = new Amazen([
                'sku' => Str::random(8),
                'name' => "Article $i",
                'description' => "Cet article $i de qualité supérieure vous offrira un confort exceptionnel lors de vos séances d'aquaponey 🦄",
                'price' => rand(1, 1000),
                'rate' => rand(1, 5),
                'stock' => rand(0, 100)
            ]);
            $amazen->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Amazen::findOrFail($id);

        dd($post);
        return $post;
    }

    public function search(string $search) {
        $products = Amazen::where('name', 'LIKE', "%$search%")
            ->orWhere('description', 'LIKE', "%$search%")
            ->get();

        return $products;
    }

    public function specificSearch() {
        $amazen = Amazen::where('rate', '>', 2)->orderBy('rate', 'DESC')->paginate(2);

        return $amazen;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $amazen = Amazen::findOrFail($id);
        $amazen->price = 30000;
        $amazen->save();

        return $amazen;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $amazen = Amazen::findOrFail($id);
        $amazen->delete();

        return $amazen;
    }

    public function moyenne()
    {
        $moy = Amazen::all()->avg('rate');

        return $moy;
    }
}
