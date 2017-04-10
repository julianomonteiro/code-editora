<?php

namespace CodeEduUser\Http\Controllers;

use CodeEduUser\Http\Requests\UserRequest;
use CodeEduUser\Http\Requests\UserSettingRequest;
use CodeEduUser\Repositories\UserRepository;

class UserSettingsController extends Controller
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserSettingsController constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit()
    {
        $user = \Auth::user();
        return view('codeeduuser::user-settings.setting', compact('user'));
    }

    /**
     * @param UserSettingRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserSettingRequest $request)
    {
        $user = \Auth::user();
        $this->repository->update($request->all(), $user->id);
        $request->session()->flash('message', 'Usuário alterado com sucesso');

        return redirect()->route('codeeduuser.user_settings.edit');
    }

}
