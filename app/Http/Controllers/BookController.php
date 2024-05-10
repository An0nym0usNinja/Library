<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
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
        $books = Book::with('author', 'genre');

        // filter by query
        if ($request->has('query')) {
            $books->where(function ($query) {
                $search = $this->request->input('query');
                $query->where('title', 'like', "%$search%")
                    ->orWhere('pages', 'like', "%$search%");
            });
        }

        // filter by genres
        if ($request->has('genres')) {
            $genres = $request->input('genres');
            $books->whereIn('genre_id', $genres);
        }

        // filter by authors
        if ($request->has('authors')) {
            $authors = $request->input('authors');
            $books->whereIn('author_id', $authors);
        }

        return view('models.book.index', [
            'books' => $books->paginate(7),
            'genres' => Genre::orderBy('name')->get(),
            'authors' => Author::orderBy('name')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = \App\Models\Genre::orderBy('name')->get();
        $authors = \App\Models\Author::orderBy('name')->get();

        return view('models.book.create', compact('genres', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('books.index')->with('success', 'Book created.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genres = \App\Models\Genre::orderBy('name')->get();
        $authors = \App\Models\Author::orderBy('name')->get();

        return view('models.book.edit', compact('book', 'genres', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect()->route('books.index')->with('success', 'Book updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted.');
    }
}
