<?php

namespace App;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements TableInterface
{
    
    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTableHeaders()
    {
        return ['#','Título','Subtitulo','Valor'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Título':
                return $this->title;
            case 'Subtitulo':
                return $this->subtitle;
            case 'Valor':
                return $this->price;
        }
        //return $this->$header;
    }

}
