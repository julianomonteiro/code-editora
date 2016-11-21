<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use App\User;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::query()->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();
        return view('books.create', compact('users'));
    }

    /**
     * @param BookRequest $request
     * @return mixed
     */
    public function store(BookRequest $request)
    {
        Book::create($request->all());
        return redirect()->route('books.index');
    }

    /**
     * @param Book $book
     * @return mixed
     */
    public function edit(Book $book)
    {
        $users = User::pluck('name','id')->all();
        return view('books.edit', compact('book', 'users'));
    }

    /**
     * @param BookRequest $request
     * @param Book $book
     * @return mixed
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->fill($request->all());
        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * @param Book $book
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
