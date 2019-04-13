<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Especie extends Model
{
    //
    protected $table = 'cat_especies';
    protected $primaryKey = 'id_especie';

    use Sortable;

    public $sortable = ['id_especie', 'especie'];

    protected $fillable = [
            'especie'
    ];

    public function amigos()
    {
        return $this->hasMany(Amigo::class,'id_especie');
    }
}
