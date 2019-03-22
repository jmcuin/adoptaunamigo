<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Estado extends Model
{
    //
    protected $table = 'cat_estados';
    protected $primaryKey = 'id_estado';

    use Sortable;

    public $sortable = ['id_estado', 'estado'];

    protected $fillable = [
            'estado'
    ];

    public function municipios()
    {
        return $this->hasMany(Municipio::class,'id_estado');
    }
}
