<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Adopcion extends Model
{
    //
    protected $table = 'adopciones';
    protected $primaryKey = 'id_adopcion';

    use Sortable;

    public $sortable = ['id_amigo', 'id_solicitud', 'nombre_adoptante', 'email', 'telefono'];

    protected $fillable = [
            'nombre_adoptante',
            'direccion_adoptante',
            'email',
            'telefono',    
            'detalles_adopcion'
    ];

    public function amigo()
    {
        return $this->belongsTo(Amigo::class,'id_amigo');
    }

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class,'id_solicitud');
    }

    public function rescatista(){
        return $this-> amigo -> id_rescatista;
    }
}
