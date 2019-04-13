<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Raza extends Model
{
    //
    protected $table = 'cat_razas';
    protected $primaryKey = 'id_raza';

    use Sortable;

    public $sortable = ['id_raza', 'raza'];

    protected $fillable = [
            'raza'
    ];

    public function amigos()
    {
        return $this->hasMany(Amigo::class,'id_raza');
    }
}
