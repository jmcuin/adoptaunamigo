<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use DB;

class Solicitud extends Model
{
    //
    protected $table = 'solicitudes';
    protected $primaryKey = 'id_solicitud';

    use Sortable;

	public $sortable = ['id_amigo', 'nombre'];

	public function amigo()
    {
        return $this->belongsTo(Amigo::class,'id_amigo');
    }
}
