<?php

namespace App\Repositories;

use App\Models\Seguimiento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SeguimientoRepository
 * @package App\Repositories
 * @version April 12, 2018, 7:49 pm UTC
 *
 * @method Seguimiento findWithoutFail($id, $columns = ['*'])
 * @method Seguimiento find($id, $columns = ['*'])
 * @method Seguimiento first($columns = ['*'])
*/
class SeguimientoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_seg',
        'descripcion_seg',
        'estado_seg'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Seguimiento::class;
    }
}
