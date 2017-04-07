<?php

namespace CodeEduBook\Http\Controllers;

use CodePub\Criteria\FindByTitleCriteria;
use CodePub\Criteria\FindByUserCriteria;
use CodeEduBook\Http\Requests\BookCreateRequest;
use CodeEduBook\Http\Requests\BookUpdateRequest;
use CodeEduBook\Models\Book;
use CodePub\Models\User;
use CodeEduBook\Repositories\BookRepository;
use CodeEduBook\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class BooksController extends Controller
{

    private $repository;

    private $categoryRepository;

    public function __construct(BookRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request);
        $search = $request->get('search');
        //$searchFields = $request->get('searchFields');
        //dd($searchFields);

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
        $categories = $this->categoryRepository->lists('name', 'id'); //pluck
        return view('books.create', compact('users', 'categories'));
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
        //$categories = $this->categoryRepository->lists('name', 'id'); //pluck

        $this->categoryRepository->withTrashed();
        $categories = $this->categoryRepository->listsWithMutators('name_trashed', 'id');

        return view('books.edit', compact('book', 'users', 'categories'));
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
