<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Amigo extends Model
{
    //
    protected $table = 'amigos';
    protected $primaryKey = 'id_amigo';

    use Sortable;

    public $sortable = ['id_amigo', 'raza', 'tamanio'];

    protected $fillable = [
            'nombre',
            'raza',
            'tamanio',
            'caracter',    
            'convivencia',
            'recomendaciones',
            'requisitos',
            'otros'
    ];

    public function rescatista()
    {
        return $this->belongsTo(Rescatista::class,'id_rescatista');
    }

    public function especie()
    {
        return $this->belongsTo(Especie::class,'id_especie');
    }

    public function raza()
    {
        return $this->belongsTo(Raza::class,'id_raza');
    }
    
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class,'id_amigo');
    }
}
