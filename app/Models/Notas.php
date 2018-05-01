<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notas extends Model
{
    use SoftDeletes;

    public $table = 'notas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_asignatura',
        'asignatura',
        'grupo',
        'docente',
        'id_estudiante',
        'estudiante',
        'corte1',
        'corte2',
        'corte3'
    ];

   
    protected $casts = [
        'id_asignatura' => 'string',
        'asignatura' => 'string',
        'grupo' => 'string',
        'docente' => 'string',
        'id_estudiante' => 'string',
        'estudiante' => 'string',
        'corte1' => 'string',
        'corte2' => 'string',
        'corte3' => 'string'
    ];

   
    public static $rules = [
        'id_asignatura' => 'required',
        'asignatura' => 'required',
        'grupo' => 'required',
        'docente' => 'required',
        'id_estudiante' => 'required'
    ];

    
}
