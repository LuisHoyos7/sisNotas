<?php

namespace App\Repositories;

use App\Models\Notas2;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Notas2Repository
 * @package App\Repositories
 * @version May 22, 2018, 7:22 pm UTC
 *
 * @method Notas2 findWithoutFail($id, $columns = ['*'])
 * @method Notas2 find($id, $columns = ['*'])
 * @method Notas2 first($columns = ['*'])
*/
class Notas2Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Notas2::class;
    }
}
