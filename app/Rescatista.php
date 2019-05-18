<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Rescatista extends Model
{
    //
    protected $table = 'rescatistas';
    protected $primaryKey = 'id_rescatista';

    use Sortable;

    public $sortable = ['id_rescatista', 'nombre', 'a_paterno', 'a_materno', 'alias', 'email','id_estado_municipio'];

    protected $fillable = [
		'nombre',
        'a_paterno',
        'a_materno',
        'alias'
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class,'id_estado_municipio');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id_rescatista');
    }

    public function amigos()
    {
        return $this->hasMany(Amigo::class,'id_amigo');
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class,'id_rescatista');
    }
}
