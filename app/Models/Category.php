<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TableInterface
{

    public function getTableHeaders()
    {
        return ['#','Nome'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Nome':
                return $this->name;
        }
        //return $this->$header;
    }

    protected $fillable = [
        'name'
    ];

}
