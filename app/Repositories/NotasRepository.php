<?php

namespace App\Repositories;

use App\Models\Notas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NotasRepository
 * @package App\Repositories
 * @version April 24, 2018, 7:07 am UTC
 *
 * @method Notas findWithoutFail($id, $columns = ['*'])
 * @method Notas find($id, $columns = ['*'])
 * @method Notas first($columns = ['*'])
*/
class NotasRepository extends BaseRepository
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
        return Notas::class;
    }
}
