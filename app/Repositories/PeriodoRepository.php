<?php

namespace App\Repositories;

use App\Models\Periodo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PeriodoRepository
 * @package App\Repositories
 * @version April 12, 2018, 7:48 pm UTC
 *
 * @method Periodo findWithoutFail($id, $columns = ['*'])
 * @method Periodo find($id, $columns = ['*'])
 * @method Periodo first($columns = ['*'])
*/
class PeriodoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado_per',
        'nombre_per'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Periodo::class;
    }
}
