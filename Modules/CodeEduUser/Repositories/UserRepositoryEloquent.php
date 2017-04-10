<?php

namespace CodeEduUser\Repositories;

use CodeEduUser\Models\User;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent
 * @package CodeEduUser\Repositories
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    public function create(array $attributes)
    {
        $attributes['password'] = User::generatePassword();

        $model = parent::create($attributes);
        \UserVerification::generate($model);
        $subject = config('codeeduuser.email.user_created.subject');
        \UserVerification::emailView('codeeduuser::emails.user-created');
        \UserVerification::send($model, $subject);
    }

    public function update(array $attributes, $id)
    {
        $attributes['password'] = User::generatePassword($attributes['password']);
        return parent::update($attributes, $id);
    }

    /*
    public function create(array $attributes)
    {
        $model = parent::create($attributes);
        $model->categories()->sync($attributes['categories']);

        return $model;
    }

    public function update(array $attributes, $id)
    {
        $model = parent::update($attributes, $id);
        $model->categories()->sync($attributes['categories']);

        return $model;
    }
    */

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
