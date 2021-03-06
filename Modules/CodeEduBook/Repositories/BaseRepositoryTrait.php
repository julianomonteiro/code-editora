<?php

namespace CodeEduBook\Repositories;


trait BaseRepositoryTrait
{

    public function lists($column, $key = null)
    {
        $this->applyCriteria();

        return $this->model->pluck($column, $key);
    }

}