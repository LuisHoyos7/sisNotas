<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Periodo extends Model
{
    use SoftDeletes;

    public $table = 'periodos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'estado_per',
        'nombre_per'
    ];

   
    protected $casts = [
        'estado_per' => 'string',
        'nombre_per' => 'string'
    ];

   
    public static $rules = [
        'estado_per' => 'required',
        'nombre_per' => 'required'
    ];

    public function seguimientos()
    {
        return $this->hasMany(\App\Models\Seguimiento::class, 'id_per');
    }
}
