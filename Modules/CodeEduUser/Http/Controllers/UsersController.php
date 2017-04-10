<?php

namespace CodeEduUser\Http\Controllers;

use CodeEduUser\Http\Requests\UserRequest;
use CodeEduUser\Models\User;
use CodeEduUser\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
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
        $users = $this->repository->paginate(10);
        //$users = User::withTrashed()->paginate(10);
       // $users = User::onlyTrashed()->paginate(10);
        return view('codeeduuser::users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('codeeduuser::users.create');
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $this->repository->create($request->all());
        $url = $request->get('redirect_to', route('categories.index'));
        $request->session()->flash('message', 'Usuário cadastrado com sucesso');

        return redirect()->to($url);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = $this->repository->find($id);
        return view('codeeduuser::users.edit', compact('user'));
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->except(['password']);
        $this->repository->update($data, $id);
        $url = $request->get('redirect_to', route('categories.index'));
        $request->session()->flash('message', 'Usuário alterado com sucesso');

        return redirect()->to($url);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        Session::flash('message', 'Usuário removido com sucesso');

        return redirect()->to(\URL::previous());
    }
}
