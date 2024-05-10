<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::paginate(7);

        return view('models.genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        Genre::create($request->validated());

        return redirect()->route('genres.index')->with('success', 'Genre created.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('models.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());

        return redirect()->route('genres.index')->with('success', 'Genre updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Genre deleted.');
    }

    /**
     * Search for a genre by name.
     * @param Request $request
     * @return JsonResponse
     */
    public function ajaxGenreName(Request $request): JsonResponse
    {
        $generes = Genre::query();

        if ($request->has('query')) {
            $generes->where('name', 'like', '%' . $request->get('query') . '%');
        }

        return response()->json([
            'data' => $generes->pluck('name')
        ]);
    }
}
