<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * The request instance.
     */
    public $request;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->request = $request;
        $authors = Author::query();

        // filter by query
        if ($request->has('query')) {
            $authors->where(function ($query) {
                $search = $this->request->input('query');
                $query->where('name', 'like', "%$search%");
            });
        }

        return view('models.author.index', [
            'authors' => $authors->paginate(7),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create($request->validated());

        return redirect()->route('authors.index')->with('success', 'Author created.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('models.author.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return redirect()->route('authors.index')->with('success', 'Author updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted.');
    }

    /**
     * Search for a author by name.
     * @param Request $request
     * @return JsonResponse
     */
    public function ajaxAuthorName(Request $request): JsonResponse
    {
        $authors = Author::query();

        if ($request->has('query')) {
            $authors->where('name', 'like', '%' . $request->get('query') . '%');
        }

        return response()->json([
            'data' => $authors->pluck('name')
        ]);
    }
}
