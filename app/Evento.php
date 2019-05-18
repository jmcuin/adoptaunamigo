<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Evento extends Model
{
    //
    protected $table = 'eventos';
    protected $primaryKey = 'id_evento';

    use Sortable;

    public $sortable = ['id_evento', 'nombre'];

    protected $fillable = [
            'nombre',
            'descripcion',
            'lugar',
            'fecha',
            'hora',
            'enlace_facebook',
            'email',
            'telefono'
    ];

    public function amigos()
    {
        return $this->belongsTo(Rescatista::class,'id_rescatista');
    }
}
