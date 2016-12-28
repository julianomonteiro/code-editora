<?php

namespace CodePub\Http\Controllers;

use CodePub\Criteria\FindByTitleCriteria;
use CodePub\Criteria\FindByUserCriteria;
use CodePub\Http\Requests\BookCreateRequest;
use CodePub\Http\Requests\BookUpdateRequest;
use CodePub\Models\Book;
use CodePub\Models\User;
use CodePub\Repositories\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller
{

    private $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->get('search');
        //$this->repository->skipCriteria();
        $books = $this->repository->paginate(10);
        return view('books.index', compact('books', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id')->all();
        return view('books.create', compact('users'));
    }

    /**
     * @param BookCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookCreateRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $this->repository->create($data);

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
        $users = User::pluck('name', 'id')->all();
        return view('books.edit', compact('book', 'users'));
    }

    /**
     * @param BookUpdateRequest $request
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $data = $request->except(['user_id']);
        $this->repository->update($data, $id);

        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Livro alterado com sucesso');

        return redirect()->to($url);
    }

    /**
     * @param Book $book
     * @return mixed
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        Session::flash('message', 'Livro removido com sucesso');

        return redirect()->to(\URL::previous());
    }
}
