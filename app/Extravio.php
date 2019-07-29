<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Extravio extends Model
{
    //
    protected $table = 'extravios';
    protected $primaryKey = 'id_extravio';

    use Sortable;

    public $sortable = ['id_extravio', 'nombre'];

    protected $fillable = [
            'ultimo_avistamiento_fecha',
            'ultimo_avistamiento_lugar',
            'descripcion_amigo',
            'descripcion_evento',
            'senias_particulares',
            'contacto_persona',
            'telefono',
            'email',
            'recompenza_monto'
    ];
}
