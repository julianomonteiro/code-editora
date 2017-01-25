<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TableInterface
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function getTableHeaders()
    {
        return ['#', 'Nome'];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
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

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function getNameTrashedAttribute()
    {
        return $this->trashed() ? "{$this->name} (Inativa)" : $this->name;
    }

}
