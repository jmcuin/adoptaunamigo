<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Solicitud extends Model
{
    //
    protected $table = 'solicitudes';
    protected $primaryKey = 'id_solicitud';

    use Sortable;

	public $sortable = ['id_amigo'];

	public function amigo()
    {
        return $this->belongsTo(Amigo::class,'id_amigo');
    }
}
