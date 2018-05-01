<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Seguimiento extends Model
{
    use SoftDeletes;

    public $table = 'seguimientos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id_per',
        'nombre_seg',
        'descripcion_seg',
        'estado_seg'
    ];

    protected $casts = [
        'id_per' => 'integer',
        'nombre_seg' => 'string',
        'descripcion_seg' => 'string',
        'estado_seg' => 'string'
    ];

    public static $rules = [
        'nombre_seg' => 'required',
        'descripcion_seg' => 'required',
        'estado_seg' => 'required'
    ];

    public function periodo()
    {
        return $this->belongsTo(\App\Models\Periodo::class, 'id_per', 'id');
    }
}
