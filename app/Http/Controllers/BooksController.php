<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro cadastrado com sucesso');

        return redirect()->to($url);
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

        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro alterado com sucesso');

        return redirect()->to($url);
    }

    /**
     * @param Book $book
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();
        Session::flash('message', 'Livro removido com sucesso');

        return redirect()->to(\URL::previous());
    }
}
