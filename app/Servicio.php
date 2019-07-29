<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Servicio extends Model
{
    //
    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';

    use Sortable;

    public $sortable = ['id_servicio', 'servicio', 'telefono', 'email'];

    protected $fillable = [
            'descripcion',
            'precio',
            'terminos_y_condiciones',
            'enlace_facebook'
    ];

    public function rescatista()
    {
        return $this->belongsTo(Rescatista::class,'id_rescatista');
    }
}
