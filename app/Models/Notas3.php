<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notas3
 * @package App\Models
 * @version May 28, 2018, 2:20 am UTC
 *
 * @property string id_asignatura
 * @property string asignatura
 * @property string grupo
 * @property string docente
 * @property string id_estudiante
 * @property string estudiante
 * @property string corte1
 * @property string corte2
 * @property string corte3
 */
class Notas3 extends Model
{
    use SoftDeletes;

    public $table = 'notas3s';
    

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

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
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

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_asignatura' => 'required',
        'asignatura' => 'required',
        'grupo' => 'required',
        'docente' => 'required',
        'id_estudiante' => 'required'
    ];


    public function scopeId($query, $id_asignatura){

            if($id_asignatura)

                return $query->where('id_asignatura', 'LIKE',"%$id_asignatura%");
        }

        public function scopeGrupo($query, $grupo){

            if($grupo)

                return $query->where('grupo', 'LIKE',"%$grupo%");
        }

        public function scopeCorte2($query, $parametro1,$parametro2){

            if($parametro1 && $parametro2)

                return $query->whereBetween(\DB::raw('((corte1+corte2+corte3)/3)'),[$parametro1,$parametro2]);

        }


    
}
