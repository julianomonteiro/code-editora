<?php

namespace CodeEduBook\Http\Controllers;

use CodeEduBook\Repositories\BookRepository;
use Illuminate\Http\Request;

class BooksTrashedController extends Controller
{

    /**
     * @var BookRepository
     */
    private $repository;

    /**
     * BooksTrashedController constructor.
     * @param BookRepository $repository
     */
    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        //$this->repository->skipCriteria();
        //$this->repository->pushCriteria(FindOnlyTrashedCriteria::class);

        $books = $this->repository->onlyTrashed()->paginate(10);
        //$books = Book::onlyTrashed()->paginate(10);
        return view('codeedubook::trashed.books.index', compact('books', 'search'));
    }

    public function show($id)
    {
        $this->repository->onlyTrashed();
        $book = $this->repository->find($id);

        return view('codeedubook::trashed.books.show', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $this->repository->onlyTrashed();
        $this->repository->restore($id);

        $url = $request->get('redirect_to', route('trashed.books.index'));
        $request->session()->flash('message', 'Livro restaurado com sucesso');

        return redirect()->to($url);
    }

}
