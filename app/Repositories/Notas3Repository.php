<?php

namespace App\Repositories;

use App\Models\Notas3;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Notas3Repository
 * @package App\Repositories
 * @version May 28, 2018, 2:20 am UTC
 *
 * @method Notas3 findWithoutFail($id, $columns = ['*'])
 * @method Notas3 find($id, $columns = ['*'])
 * @method Notas3 first($columns = ['*'])
*/
class Notas3Repository extends BaseRepository
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
        return Notas3::class;
    }
}
